<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Service;

use Eccube\Entity\Customer;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModel;
use Plugin\AceClient\AceServices\Service\JyudenService;
use Plugin\AceClient\Util\Mapper\OverviewMapper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Eccube\Service\Payment\PaymentMethodInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden as JyudenRequest;
use Plugin\AceClient\AceServices\Model\Response\Jyuden as JyudenResponse;
use Plugin\AceClient\AceServices\Model\Request\Member as MemberRequest;
use Plugin\AceClient\AceServices\Model\Response\Member as MemberResponse;
use Plugin\AceClient;
use Eccube\Service\CartService;
use Eccube\Entity\CustomerAddress;
use Eccube\Repository\CustomerAddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Master\OrderItemType;
use Eccube\Entity\Master\TaxType;
use Eccube\Entity\Master\RoundingType;
use Eccube\Entity\OrderItem;
use Eccube\Service\PurchaseFlow\Processor\DeliveryFeePreprocessor;
use Eccube\Repository\ProductClassRepository;
use Eccube\Repository\ProductRepository;
use Eccube\Entity\Tag;

class ShoppingHelper
{
    /**
    * @var ContainerInterface
    */
    protected $serviceContainer;

        /**
     * @var CartService
     */
    protected $cartService;

    public AceClient\AceClient $aceClient;
    /**
     * @var CustomerAddressRepository
     */
    protected $customerAddressRepository;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ProductClassRepository
     */
    protected $productClassRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(
        ContainerInterface $serviceContainer,
        AceClient\AceClient $aceClient,
        CartService $cartService,
        CustomerAddressRepository $customerAddressRepository,
        EntityManagerInterface $entityManager,
        ProductClassRepository $productClassRepository,
        ProductRepository $productRepository,
    ) {
        $this->serviceContainer = $serviceContainer;
        $this->aceClient = $aceClient;
        $this->cartService = $cartService;
        $this->customerAddressRepository = $customerAddressRepository;
        $this->entityManager = $entityManager;
        $this->productClassRepository = $productClassRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * PaymentMethodをコンテナから取得する.
     *
     * @param Order $Order
     * @param FormInterface $form
     *
     * @return PaymentMethodInterface
     */
    public function createPaymentMethod(Order $Order, FormInterface $form)
    {
        $PaymentMethod = $this->serviceContainer->get($Order->getPayment()->getMethodClass());
        $PaymentMethod->setOrder($Order);
        $PaymentMethod->setFormType($form);

        return $PaymentMethod;
    }

    /**
     * Decision Cart On Ace
     *
     * @param Order $Order
     * @param $User
     * @param $SessId
     * @return array<string, string>
     */
    public function decisionCartOnAce(Order $Order, $User, $SessId): array
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartErr = $this->addNewCartOnAce($Order, $jyudenService, $User, $SessId);
        if ($addCartErr['iserror']) {
            return $addCartErr;
        }
        try {
            $decisionCartRequest = (new JyudenRequest\DecisionCart\DecisionCartRequestModel())
                                    ->setId(OverviewMapper::ACE_TEST_SYID)
                                    ->setSessId($SessId);
            $response = $jyudenService->makeDecisionCartMethod()
                                      ->withRequest($decisionCartRequest)
                                      ->send();
            if ($response->getStatusCode() === 200) {
                /** @var JyudenResponse\DecisionCart\DecisionCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch (\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        return [
            'iserror'   => !empty($message1) | !empty($message2),
            'errortype' => 'decisionCartError',
            'message1'  => $message1,
            'message2'  => isset($message2) ? $message2 : '',
        ];
    }

    /**
     * Add New Cart On Ace
     *
     * @param Order $Order
     * @param JyudenService $jyudenService
     * @param $User
     * @param $SessId
     * @return array<string, string>
     */
    public function addNewCartOnAce(Order $Order, JyudenService $jyudenService, $User, $SessId): array
    {
        $addCartMethod = $jyudenService->makeAddCartMethod();
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setSessId($SessId)
                                ->setPrm($this->buildPrmForAddCart($Order, $User));
        $addCartRequestModel->getPrm()->getJyuden()->setCampaign(0);
        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            if ($response->getStatusCode() === 200) {
                /** @var JyudenResponse\AddCart\AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }

        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }

        return [
            'iserror'   => !empty($message1) | !empty($message2),
            'errortype' => 'addCartError',
            'message1'  => $message1,
            'message2'  => isset($message2) ? $message2 : '',
        ];
    }

    /**
     * Build Prm For Add Cart
     *
     * @param Order $Order
     * @param $User
     * @return OrderPrmModel
     */
    public function buildPrmForAddCart(Order $Order, $User): JyudenRequest\AddCart\OrderPrmModel
    {
        /** @var Customer $Customer */
        $Customer = $User;
        $member = (new JyudenRequest\AddCart\MemberOrderModel)
                   ->setJmember((new JyudenRequest\AddCart\JmemberModel())->setCode($Customer->getMemId()))
                   ->setSmember((new JyudenRequest\AddCart\SmemberModel())->setCode($Customer->getMemId()))
                   ->setNmember((new JyudenRequest\AddCart\NmemberModel())->setEda(1));

        $jyuden = (new JyudenRequest\AddCart\JyudenModel)
            ->setPcode(1)
            ->setJcode(1)
            ->setHcode(1)
            ->setCampaign(1);

        $jyumeis = [];
        foreach ($this->cartService->getCart()->getItems() as $Item) {
            $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                          ->setGcode($Item->getProductClass()->getCode())
                          ->setTanka($Item->getPrice())
                          ->setSuu($Item->getQuantity())
                          ->setTaxkbn(1);
        }
        foreach ($Order->getItems() as $Item) {
            if ($Item->getProductName() === 'Coupon') {
                $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                              ->setGcode('c-2')
                              ->setSuu(1)
                              ->setTanka($Item->getPrice() + $Item->getTax())
                              ->setTaxkbn(1);
            }
        }

        if ($Order->getDeliveryFeeTotal() > 0) {
            $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                          ->setGcode('s-1')
                          ->setSuu(1)
                          ->setTanka($Order->getDeliveryFeeTotal())
                          ->setTaxkbn(1);
        }
        return (new JyudenRequest\AddCart\OrderPrmModel())
               ->setMember($member)
               ->setJyuden($jyuden)
               ->setDetail((new JyudenRequest\AddCart\DetailModel())->setJyumei($jyumeis))
               ->setMailjyuden((new JyudenRequest\AddCart\MailJyudenModel())->setMail($Customer->getEmail()));
    }

    public function buildPrmForGetDelivery(Order $Order, $User): JyudenRequest\AddCart\OrderPrmModel
    {
        /** @var Customer $Customer */
        $Customer = $User;
        $member = (new JyudenRequest\AddCart\MemberOrderModel)
            ->setJmember((new JyudenRequest\AddCart\JmemberModel())->setCode($Customer->getMemId()))
            ->setSmember((new JyudenRequest\AddCart\SmemberModel())->setCode($Customer->getMemId()))
            ->setNmember((new JyudenRequest\AddCart\NmemberModel())->setEda(1));

        $jyuden = (new JyudenRequest\AddCart\JyudenModel)
            ->setPcode(1)
            ->setJcode(1)
            ->setHcode(1)
            ->setCampaign(1);

        $jyumeis = [];
        foreach ($this->cartService->getCart()->getItems() as $Item) {
            $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                ->setGcode($Item->getProductClass()->getCode())
                ->setTanka($Item->getPrice())
                ->setSuu($Item->getQuantity())
                ->setTaxkbn(1);
        }

        return (new JyudenRequest\AddCart\OrderPrmModel())
            ->setMember($member)
            ->setJyuden($jyuden)
            ->setDetail((new JyudenRequest\AddCart\DetailModel())->setJyumei($jyumeis))
            ->setMailjyuden((new JyudenRequest\AddCart\MailJyudenModel())->setMail($Customer->getEmail()));
    }

    /**
     * Get Coupon in ACE
     *
     * @param Order $Order
     * @param ?string $CouponCode
     * @param $User
     * @param $SessId
     * @return array<string, string>
     */
    public function getCouponAce(Order $Order, ?string $CouponCode, $User, $SessId): array
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartMethod = $jyudenService->makeAddCartMethod();
        $prm = $this->buildPrmForAddCart($Order, $User);
        $prm->getJyuden()->setFmemo2($CouponCode);
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setSessId($SessId)
                                ->setPrm($prm);
        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            foreach($response->getResponse()->getOrder()->getJyumei() as $jyumei) {
                if ($jyumei->getGcode() == 'c-2') {
                    return [
                        'CouponCodeOk' => $CouponCode,
                        'CouponValue' => $jyumei->getTinmoney()
                    ];
                }
            }
            if ($response->getStatusCode() === 200) {
                /** @var JyudenResponse\AddCart\AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();

                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }

        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        return [
            'CouponCodeOk' => "",
            'CouponValue' => ""
        ];
    }

    /**
     * Build Prm For Reg Mem Adr
     *
     * @param CustomerAddress $CustomerAddress
     * @return MemberRequest\RegMemAdr\MemberPrmModel
     */
    public function buildPrmForRegMemAdr(CustomerAddress $CustomerAddress): MemberRequest\RegMemAdr\MemberPrmModel
    {

        $nmember = (new MemberRequest\RegMemAdr\NmemberModel())
                ->setCode($CustomerAddress->getCustomer()->getMemId())
                ->setBetu(1)
                ->setSimei($CustomerAddress->getName01().$CustomerAddress->getName02())
                ->setKana($CustomerAddress->getKana01().$CustomerAddress->getKana02())
                ->setZip($CustomerAddress->getPostalCode())
                ->setAdr1($CustomerAddress->getPref()->getName())
                ->setAdr2($CustomerAddress->getAddr01())
                ->setAdr3($CustomerAddress->getAddr02())
                ->setAdr4($CustomerAddress->getCompanyName())
                ->setTel($CustomerAddress->getPhoneNumber());

        return (new MemberRequest\RegMemAdr\MemberPrmModel())
               ->setNmember($nmember);
    }

    /**
     * Reg New Adr Ace
     *
     * @param CustomerAddress $Order
     * @param AceClient\AceServices\Service\MemberService $memberService
     *
     * @return array<string, string>
     */
    public function RegNewAdrAce (CustomerAddress $CustomerAddress, $memberService): array
    {
        $regMemAdrMethod = $memberService->makeRegMemAdrMethod();
        $regMemAdrRequestModel = (new MemberRequest\RegMemAdr\RegMemAdrRequestModel())
                                ->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setPrm($this->buildPrmForRegMemAdr($CustomerAddress));
        try{
            $response = $regMemAdrMethod->withRequest($regMemAdrRequestModel)
                                      ->send();
            if ($response->getStatusCode() === 200) {
                /** @var MemberResponse\RegMemAdr\RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message2 = $responseObj->getMember()->getMessage()->getMessage2();
                if ($responseObj->getMember()->getNmember() != null) {
                    return [
                        'iserror'   => false,
                        'eda' => $responseObj->getMember()->getNmember()->getEda(),
                    ];
                }
            }

        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        return [
            'iserror'   => !empty($message1) | !empty($message2),
            'errortype' => 'RegMemAdrError',
            'message1'  => $message1,
            'message2'  => isset($message2) ? $message2 : '',
        ];
    }

    /**
     * GET Delivery Fee in ACE
     *
     * @param Order $Order
     * @param string $eda
     * @param $User
     * @param string $SessId
     *
     * @return array<string>
     */
    public function getDeliveryFeeAce(Order $Order, string $eda, $User, string $SessId): array
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartMethod = $jyudenService->makeAddCartMethod();
        $prm = $this->buildPrmForGetDelivery($Order, $User);
        $prm->getMember()->getNmember()->setEda($eda);
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(OverviewMapper::ACE_TEST_SYID)
                                ->setSessId($SessId)
                                ->setPrm($prm);
        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            foreach($response->getResponse()->getOrder()->getJyumei() as $jyumei) {
                if ($jyumei->getGcode() == 's-1' and $jyumei->getCkbn() != 0) {
                    return [
                        'delivery_fee' => $jyumei->getTintanka(),
                    ];
                }
            }
            if ($response->getStatusCode() === 200) {
                /** @var JyudenResponse\AddCart\AddCartResponseModel $responseObj */
                $responseObj = $response->getResponse();

                $message1 = $responseObj->getOrder()->getMessage()->getMessage1();
                $message2 = $responseObj->getOrder()->getMessage()->getMessage2();
            }
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        return [
            'delivery_fee' => '',
        ];
    }

    /**
     * Get Eda in EC
     *
     * @param Shipping $Shipping
     * @param Customer $Customer
     *
     * @return string
     */
    public function getEdaEc(Shipping $Shipping, Customer $Customer): string
    {
        return $this->customerAddressRepository
        ->getEda($Shipping, $Customer);
    }

    /**
     * Add Order Delivery Fee Item From Ace
     *
     * @param Order $Order
     * @param $User
     * @param string $SessId
     *
     * @return void
     */
    public function addOrderDeliveryFeeItemFromAce(Order $Order, $User, string $SessId): void
    {
        $Customer = $Order->getCustomer();
        foreach ($Order->getShippings() as $Shipping) {
            $this->reinitializeDeliveryFeeEC($Order);
            $eda = $this->customerAddressRepository->getEda($Shipping->getPref(), $Customer);
            $delivery_fee = $this->getDeliveryFeeAce($Order, $eda, $User, $SessId)['delivery_fee'];
            if ($delivery_fee === '') {
                $delivery_fee = 1000;
            }
            $DeliveryFree = new OrderItem();
            $DeliveryFree->setProductName('delivery_fee');
            $DeliveryFree->setProductCode('s-1');
            $DeliveryFree->setPrice((int)$delivery_fee);
            $DeliveryFree->setTax((int)$delivery_fee*0.1);
            $DeliveryFree->setTaxRate(10);
            $DeliveryFree->setQuantity('1');
            $DeliveryFree->setCurrencyCode('JPY');
            $DeliveryFree->setOrder($Order);
            $DeliveryFree->setProcessorName(DeliveryFeePreprocessor::class);
            $DeliveryFree->setShipping($Shipping);
            $ItemProduct = $this->entityManager->find(OrderItemType::class, OrderItemType::DELIVERY_FEE);
            $DeliveryFree->setOrderItemType($ItemProduct);
            $Order->addOrderItem($DeliveryFree);
            $Shipping->addOrderItem($DeliveryFree);
        }
    }

    /**
     * Re-initialize Coupon in EC
     *
     * @param Order $Order
     */
    public function reinitializeCouponEC(Order $Order): void
    {
        foreach($Order->getOrderItems() as $Item) {
            if ($Item->getProductName() === 'Coupon') {
                $this->entityManager->remove($Item);
                $this->entityManager->flush();
            }
        }
        $Order->setCounponCode('');
        $this->entityManager->persist($Order);
        $this->entityManager->flush();
    }

    /**
     * Re-initialize Delivery Fee in EC
     *
     * @param Order $Order
     */
    public function reinitializeDeliveryFeeEC(Order $Order): void
    {
        foreach($Order->getOrderItems() as $Item) {
            if ($Item->getProductName() === 'delivery_fee') {
                $this->entityManager->remove($Item);
                $this->entityManager->flush();
            }
        }
    }

    /**
     * Add Order Coupon Item
     *
     * @param Order $Order
     * @param string $CouponValue
     *
     * @return void
     */
    public function addOrderCouponItem(Order $Order, string $CouponValue): void
    {
        $OrderCoupon = new OrderItem();
        $OrderCoupon->setProductName('Coupon');
        $OrderCoupon->setProductCode('c-2');
        $OrderCoupon->setPrice($CouponValue);
        $OrderCoupon->setTax($CouponValue*0.1);
        $OrderCoupon->setTaxRate(10);
        $TaxType = $this->entityManager->find(TaxType::class, TaxType::TAXATION);
        $OrderCoupon->setQuantity('1');
        $OrderCoupon->setCurrencyCode('JPY');
        $OrderCoupon->setOrder($Order);
        $ItemProduct = $this->entityManager->find(OrderItemType::class, OrderItemType::DISCOUNT);
        $OrderCoupon->setTaxType($TaxType);
        $RoundingType = $this->entityManager->find(RoundingType::class, RoundingType::ROUND);
        $OrderCoupon->setRoundingType($RoundingType);
        $OrderCoupon->setOrderItemType($ItemProduct);
        $Order->addOrderItem($OrderCoupon);
    }

    /**
     * Get Gift Product in ACE
     *
     * @param $User
     * @param $SessId
     *
     * @return array<array<string>>
     */
    public function getGiftProductAce($User, $SessId): array
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartMethod = $jyudenService->makeAddCartMethod();

        $member = (new JyudenRequest\AddCart\MemberOrderModel)
                ->setJmember((new JyudenRequest\AddCart\JmemberModel())->setCode($User->getMemId()))
                ->setSmember((new JyudenRequest\AddCart\SmemberModel())->setCode($User->getMemId()))
                ->setNmember((new JyudenRequest\AddCart\NmemberModel())->setEda(1));
        $jyuden = (new JyudenRequest\AddCart\JyudenModel)
                ->setPcode(1)
                ->setJcode(1)
                ->setHcode(1)
                ->setCampaign(1);

        $jyumeis = [];
        foreach ($this->cartService->getCart()->getItems() as $Item) {
            if ($Item->getTag() !== Tag::GIFT) {
                $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                ->setGcode($Item->getProductClass()->getCode())
                ->setTanka($Item->getPrice())
                ->setSuu($Item->getQuantity())
                ->setTaxkbn(1);
            }
        }
        $prm =  (new JyudenRequest\AddCart\OrderPrmModel())
                ->setMember($member)
                ->setJyuden($jyuden)
                ->setDetail((new JyudenRequest\AddCart\DetailModel())->setJyumei($jyumeis))
                ->setMailjyuden((new JyudenRequest\AddCart\MailJyudenModel())->setMail($User->getEmail()));
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                ->setId(OverviewMapper::ACE_TEST_SYID)
                ->setSessId($SessId)
                ->setPrm($prm);

        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            if ($response->getStatusCode() === 200) {
                //レスポンスACEからすべてのjyumeiを取得する
                $jyumeis = $response->getResponse()->getOrder()->getJyumei();
                $result = [];
                //CKBN と GCODE を一緒にマップする
                $mapCkbnToGcode = $this->createCkbnToGcodeMap($jyumeis);

                foreach ($jyumeis as $jyumei) {
                    // parent_ckbn を取得してarrayに作成します
                    $parentCkbn = explode(',', $jyumei->getParentCkbn());
                    if (!empty($parentCkbn[0])) {
                        $parentGcode = $jyumei->getGcode();
                        $this->addGcodeToResult($result, $parentGcode, $parentCkbn, $mapCkbnToGcode);
                    }
                }
                $message1 = $response->getResponse()->getOrder()->getMessage()->getMessage1();
                $message2 = $response->getResponse()->getOrder()->getMessage()->getMessage2();

                //「result」変数にはparentGcodeとgiftGcodeが含まれています
                return $result;
            }
        } catch(\Throwable $e) {
            $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
        return [];
    }

    /**
     * Add Gcode To Result
     * @param $result
     * @param $parentGcode
     * @param $parentCkbn
     * @param $mapCkbnToGcode
     * @return void
     */
    private function addGcodeToResult(&$result, $parentGcode, $parentCkbn, $mapCkbnToGcode): void
    {
        foreach ($parentCkbn as $ckbn) {
            if (isset($mapCkbnToGcode[$ckbn])) {
                if (!isset($result[$parentGcode])) {
                    $result[$parentGcode] = []; // creat result with parentGcode as key
                }

                $result[$parentGcode] = array_merge($result[$parentGcode], $mapCkbnToGcode[$ckbn]);
            }
        }
    }

    /**
     * Create Map Ckbn To Gcode
     *
     * @param array $jyumeis
     *
     * @return array<array<string>>
     */
    private function createCkbnToGcodeMap(array $jyumeis): array
    {
        $map = [];

        foreach ($jyumeis as $jyumei) {
            $ckbn = $jyumei->getCkbn();
            $gcode = $jyumei->getGcode();

            if (!isset($map[$ckbn])) {
                $map[$ckbn] = [];
            }

            $map[$ckbn][] = $gcode;
        }

        return $map;
    }

    /**
     * 商品がCartに入っているか確認する
     *
     * @param $Carts
     * @param $ProductClass
     * @return boolean
     */
    public function isExistedProduct($Carts, $ProductClass): bool
    {
        foreach($Carts as $Cart) {
            if ($Cart->getProductClass()->getCode() === $ProductClass->getCode()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add Gift Product in EC
     *
     * @param $Products
     * @param $allGiftProduct
     *
     * @return array $newCampaignItems
     */
    public function addGiftProductEc($Products, $allGiftProduct): array
    {
        $newCampaignItems = [];
        foreach ($Products as $Product) {
            $parentProductCode = $Product->getProductClass()->getCode();
            //商品プレゼントがある場合
            if (isset($allGiftProduct[$parentProductCode])) {
                foreach ($allGiftProduct[$parentProductCode] as $giftProductCode) {
                    $ProductClass = $this->productClassRepository->getProductClassByProductCode($giftProductCode);
                    if ($ProductClass !== null) {
                        $cartItems = $this->cartService->getCart()->getItems();
                        if (!$this->isExistedProduct($cartItems, $ProductClass)) {
                            $this->cartService->addProduct($ProductClass, 1, Tag::GIFT);
                            $newCampaignItems[] = [
                                'name' => $ProductClass->getProduct()->getName(),
                                'quantity' => 1,
                            ];
                        }
                    }
                }
            }
        }
        return $newCampaignItems;
    }
}