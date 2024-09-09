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

use Eccube\Entity\Order;
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

    public function __construct(
        ContainerInterface $serviceContainer,
        AceClient\AceClient $aceClient,
        CartService $cartService,
        CustomerAddressRepository $customerAddressRepository,
        EntityManagerInterface $entityManager,
    ){
        $this->serviceContainer = $serviceContainer;
        $this->aceClient = $aceClient;
        $this->cartService = $cartService;
        $this->customerAddressRepository = $customerAddressRepository;
        $this->entityManager = $entityManager;
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
     * @param Order $Shipping
     *
     * @return array<string, string>
     */
    public function decisionCartOnAce(Order $Order, $User, $SessId): array
    {

        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartErr = $this->addNewCartOnAce($Order, $jyudenService, $User, $SessId);
        if ($addCartErr['iserror'] == true) {
            return $addCartErr;
        }

        try {
            $decisionCartRequest = (new JyudenRequest\DecisionCart\DecisionCartRequestModel())
                                    ->setId(13)
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
     * @param AceClient\AceServices\Service\JyudenService $jyudenService
     *
     * @return array<string, string>
     */
    public function addNewCartOnAce(Order $Order, $jyudenService, $User, $SessId): array
    {

        $addCartMethod = $jyudenService->makeAddCartMethod();
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(13)
                                ->setSessId($SessId)
                                ->setPrm($this->buildPrmForAddCart($Order, $User));
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
     *
     * @return JyudenRequest\AddCart\OrderPrmModel
     */
    public function buildPrmForAddCart(Order $Order, $User): JyudenRequest\AddCart\OrderPrmModel
    {
        /** @var \Eccube\Entity\Customer $Customer */
        $Customer = $User;

        $member = (new JyudenRequest\AddCart\MemberOrderModel)
                   ->setJmember((new JyudenRequest\AddCart\JmemberModel())->setCode($Customer->getMemId()))
                   ->setSmember((new JyudenRequest\AddCart\SmemberModel())->setCode($Customer->getMemId()))
                   ->setNmember((new JyudenRequest\AddCart\NmemberModel())->setEda(1));

        $jyuden = (new JyudenRequest\AddCart\JyudenModel)
                   ->setPcode(10)
                   ->setJcode(1)
                   ->setBcode(100)
                   ->setBkcode(100)
                   ->setBumon(100)
                   ->setSouko(1)
                   ->setHcode(10)
                   ->setHday((new \Datetime())->modify('+14 day'))
                   ->setHtime(2)
                   ->setBunsyo(1)
                   ->setDay(new \Datetime('now'))
                   ->setWeborderno($Order->getOrderNo())
                   ->setCampaign(1);

        $jyumeis = [];
        foreach ($this->cartService->getCart()->getItems() as $Item) {
            $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                          ->setGcode($Item->getProductClass()->getCode())
                          ->setTanka($Item->getPrice())
                          ->setSuu($Item->getQuantity())
                          ->setTaxkbn(1);
        }

        if ($Order->getDeliveryFeeTotal() > 0) {
            $jyumeis[] = (new JyudenRequest\AddCart\JyumeiModel)
                          ->setGcode('n-1')
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

    /**
     * Get Coupon in ACE
     *
     * @param Order $Order
     * @param string $CouponCode
     *
     * @return array<string, string>
     */
    public function getCouponAce($Order, $CouponCode, $User, $SessId)
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartMethod = $jyudenService->makeAddCartMethod();
        $prm = $this->buildPrmForAddCart($Order, $User);
        $prm->getJyuden()->setFcode1($CouponCode);
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(13)
                                ->setSessId($SessId)
                                ->setPrm($prm);
        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            foreach($response->getResponse()->getOrder()->getJyumei() as $jyumei) {
                if ($jyumei->getGcode() == 'c-1') {
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
                                ->setId(13)
                                ->setPrm($this->buildPrmForRegMemAdr($CustomerAddress));
        try{
            $response = $regMemAdrMethod->withRequest($regMemAdrRequestModel)
                                      ->send();
            if ($response->getStatusCode() === 200) {
                /** @var MemberResponse\RegMemAdr\RegMemAdrResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $message1 = $responseObj->getMember()->getMessage()->getMessage1();
                $message2 = $responseObj->getMember()->getMessage()->getMessage2();
                if($responseObj->getMember()->getNmember() != null) {
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
     * @param string $User
     * @param string $SessId
     *
     * @return array<string>
     */
    public function getDeliveryFeeAce(Order $Order, $eda, $User, $SessId)
    {
        $jyudenService = $this->aceClient->makeJyudenService();
        $addCartMethod = $jyudenService->makeAddCartMethod();
        $prm = $this->buildPrmForAddCart($Order, $User);
        $prm->getMember()->getNmember()->setEda($eda);
        $addCartRequestModel = (new JyudenRequest\AddCart\AddCartRequestModel())
                                ->setId(13)
                                ->setSessId($SessId)
                                ->setPrm($prm);
        try {
            $response = $addCartMethod->withRequest($addCartRequestModel)
                                      ->send();
            foreach($response->getResponse()->getOrder()->getJyumei() as $jyumei) {
                if ($jyumei->getGcode() == 's-1') {
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
     * @param \Eccube\Entity\Shipping $Shipping
     * @param \Eccube\Entity\Customer $Customer
     *
     * @return string
     */
    public function getEdaEc($Shipping, $Customer){
        $eda = $this->customerAddressRepository
        ->getEda($Shipping, $Customer);
        return $eda;
    }

    /**
     * Add Order Delivery Fee Item From Ace
     *
     * @param Order $Order
     * @param string $User
     * @param string $SessId
     *
     * @return void
     */
    public function addOrderDeliveryFeeItemFromAce(Order $Order, $User, $SessId){
        $customer = $Order->getCustomer();
        foreach ($Order->getShippings() as $Shipping) {
            $eda = $this->getEdaEc($Shipping->getPref(), $customer);
            $delivery_fee = $this->getDeliveryFeeAce($Order, $eda, $User, $SessId)['delivery_fee'];
            if($delivery_fee == ''){
                $delivery_fee = 1000;
            }
            $this->reinitializeDeliveryFeeEC($Order);
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
    public function reinitializeCouponEC(Order $Order)
    {
        foreach($Order->getOrderItems() as $Item){
            if($Item->getProductName() == 'Coupon'){
                $this->entityManager->remove($Item);
                $this->entityManager->flush();
            }
        }
        $Order->setCounponCode('');
    }

    /**
     * Re-initialize Delivery Fee in EC
     *
     * @param Order $Order
     */
    public function reinitializeDeliveryFeeEC(Order $Order)
    {
        foreach($Order->getOrderItems() as $Item){
            if($Item->getProductName() == 'delivery_fee'){
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
    public function addOrderCouponItem(Order $Order, $CouponValue){
        $OrderCounpon = new OrderItem();
        $OrderCounpon->setProductName('Coupon');
        $OrderCounpon->setProductCode('c-1');
        $OrderCounpon->setPrice($CouponValue);
        $OrderCounpon->setTax($CouponValue*0.1);
        $OrderCounpon->setTaxRate(10);
        $TaxType = $this->entityManager->find(TaxType::class, TaxType::TAXATION);
        $OrderCounpon->setQuantity('1');
        $OrderCounpon->setCurrencyCode('JPY');
        $OrderCounpon->setOrder($Order);
        $ItemProduct = $this->entityManager->find(OrderItemType::class, OrderItemType::DISCOUNT);
        $OrderCounpon->setTaxType($TaxType);
        $RoundingType = $this->entityManager->find(RoundingType::class, RoundingType::ROUND);
        $OrderCounpon->setRoundingType($RoundingType);
        $OrderCounpon->setOrderItemType($ItemProduct);
        $Order->addOrderItem($OrderCounpon);
    }
}