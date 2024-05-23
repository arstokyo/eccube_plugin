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

namespace Customize\Controller;

use Eccube\Entity\BaseInfo;
use Eccube\Entity\Master\CustomerStatus;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Form\Type\Front\EntryType;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Repository\CustomerRepository;
use Eccube\Repository\Master\CustomerStatusRepository;
use Eccube\Repository\PageRepository;
use Eccube\Service\CartService;
use Eccube\Service\MailService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception as HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Eccube\Controller\AbstractController;
use Plugin\AceClient;
use Plugin\AceClient\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMember\RegMemberResponseModel;

class EntryController extends AbstractController
{
    /**
     * @var CustomerStatusRepository
     */
    protected $customerStatusRepository;

    /**
     * @var ValidatorInterface
     */
    protected $recursiveValidator;

    /**
     * @var MailService
     */
    protected $mailService;

    /**
     * @var BaseInfo
     */
    protected $BaseInfo;

    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * @var EncoderFactoryInterface
     */
    protected $encoderFactory;

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @var \Eccube\Service\CartService
     */
    protected $cartService;

    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * EntryController constructor.
     *
     * @param CartService $cartService
     * @param CustomerStatusRepository $customerStatusRepository
     * @param MailService $mailService
     * @param BaseInfoRepository $baseInfoRepository
     * @param CustomerRepository $customerRepository
     * @param EncoderFactoryInterface $encoderFactory
     * @param ValidatorInterface $validatorInterface
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        CartService $cartService,
        CustomerStatusRepository $customerStatusRepository,
        MailService $mailService,
        BaseInfoRepository $baseInfoRepository,
        CustomerRepository $customerRepository,
        EncoderFactoryInterface $encoderFactory,
        ValidatorInterface $validatorInterface,
        TokenStorageInterface $tokenStorage,
        PageRepository $pageRepository
    ) {
        $this->customerStatusRepository = $customerStatusRepository;
        $this->mailService = $mailService;
        $this->BaseInfo = $baseInfoRepository->get();
        $this->customerRepository = $customerRepository;
        $this->encoderFactory = $encoderFactory;
        $this->recursiveValidator = $validatorInterface;
        $this->tokenStorage = $tokenStorage;
        $this->cartService = $cartService;
        $this->pageRepository = $pageRepository;
    }

    /**
     * 会員登録画面.
     *
     * @Route("/entry", name="entry", methods={"GET", "POST"})
     * @Route("/entry", name="entry_confirm", methods={"GET", "POST"})
     * @Template("Entry/index.twig")
     */
    public function index(Request $request)
    {
        if ($this->isGranted('ROLE_USER')) {
            log_info('認証済のためログイン処理をスキップ');

            return $this->redirectToRoute('mypage');
        }

        /** @var \Eccube\Entity\Customer $Customer */
        $Customer = $this->customerRepository->newCustomer();

        /** @var $builder \Symfony\Component\Form\FormBuilderInterface */
        $builder = $this->formFactory->createBuilder(EntryType::class, $Customer);

        $event = new EventArgs(
            [
                'builder' => $builder,
                'Customer' => $Customer,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_ENTRY_INDEX_INITIALIZE);

        /** @var $form \Symfony\Component\Form\FormInterface */
        $form = $builder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            switch ($request->get('mode')) {
                case 'confirm':
                    log_info('会員登録確認開始');
                    log_info('会員登録確認完了');

                    return $this->render(
                        'Entry/confirm.twig',
                        [
                            'form' => $form->createView(),
                            'Page' => $this->pageRepository->getPageByRoute('entry_confirm'),
                        ]
                    );

                case 'complete':
                    log_info('会員登録開始');

                    $encoder = $this->encoderFactory->getEncoder($Customer);
                    $salt = $encoder->createSalt();
                    $password = $encoder->encodePassword($Customer->getPlainPassword(), $salt);
                    $secretKey = $this->customerRepository->getUniqueSecretKey();

                    // 通販Aceのユーザー登録
                    $response = $this->createNewMemberOnAce($Customer);
                    if ($response['iserror'] == true) {
                        return $this->render('error.twig', [
                            'error_title' => trans('通販Aceのユーザー登録に失敗しました。'),
                            'error_message' => trans($response['message1'] ?? $response['message2'] ?? 'エラーが発生しました。'),
                        ]);
                    }

                    /** @var \Eccube\Entity\Customer $Customer */
                    $Customer
                        ->setSalt($salt)
                        ->setPassword($password)
                        ->setSecretKey($secretKey)
                        ->setPoint(0);

                    $this->entityManager->persist($Customer);
                    $this->entityManager->flush();



                    log_info('会員登録完了');

                    $event = new EventArgs(
                        [
                            'form' => $form,
                            'Customer' => $Customer,
                        ],
                        $request
                    );
                    $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_ENTRY_INDEX_COMPLETE);

                    $activateFlg = $this->BaseInfo->isOptionCustomerActivate();

                    // 仮会員設定が有効な場合は、確認メールを送信し完了画面表示.
                    if ($activateFlg) {
                        $activateUrl = $this->generateUrl('entry_activate', ['secret_key' => $Customer->getSecretKey()], UrlGeneratorInterface::ABSOLUTE_URL);

                        // メール送信
                        $this->mailService->sendCustomerConfirmMail($Customer, $activateUrl);

                        if ($event->hasResponse()) {
                            return $event->getResponse();
                        }

                        log_info('仮会員登録完了画面へリダイレクト');

                        return $this->redirectToRoute('entry_complete');
                    } else {
                        // 仮会員設定が無効な場合は、会員登録を完了させる.
                        $qtyInCart = $this->entryActivate($request, $Customer->getSecretKey());

                        // URLを変更するため完了画面にリダイレクト
                        return $this->redirectToRoute('entry_activate', [
                            'secret_key' => $Customer->getSecretKey(),
                            'qtyInCart' => $qtyInCart,
                        ]);
                    }
            }
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * 会員登録完了画面.
     *
     * @Route("/entry/complete", name="entry_complete", methods={"GET"})
     * @Template("Entry/complete.twig")
     */
    public function complete()
    {
        return [];
    }

    /**
     * 会員のアクティベート（本会員化）を行う.
     *
     * @Route("/entry/activate/{secret_key}/{qtyInCart}", name="entry_activate", methods={"GET"})
     * @Template("Entry/activate.twig")
     */
    public function activate(Request $request, $secret_key, $qtyInCart = null)
    {
        $errors = $this->recursiveValidator->validate(
            $secret_key,
            [
                new Assert\NotBlank(),
                new Assert\Regex(
                    [
                        'pattern' => '/^[a-zA-Z0-9]+$/',
                    ]
                ),
            ]
        );

        if (!$this->session->has('eccube.login.target.path')) {
            $this->setLoginTargetPath($this->generateUrl('mypage', [], UrlGeneratorInterface::ABSOLUTE_URL));
        }

        if (!is_null($qtyInCart)) {
            return [
                'qtyInCart' => $qtyInCart,
            ];
        } elseif ($request->getMethod() === 'GET' && count($errors) === 0) {
            // 会員登録処理を行う
            $qtyInCart = $this->entryActivate($request, $secret_key);

            return [
                'qtyInCart' => $qtyInCart,
            ];
        }

        throw new HttpException\NotFoundHttpException();
    }

    /**
     * 会員登録処理を行う
     *
     * @param Request $request
     * @param $secret_key
     *
     * @return \Eccube\Entity\Cart|mixed
     */
    private function entryActivate(Request $request, $secret_key)
    {
        log_info('本会員登録開始');
        $Customer = $this->customerRepository->getProvisionalCustomerBySecretKey($secret_key);
        if (is_null($Customer)) {
            throw new HttpException\NotFoundHttpException();
        }

        $CustomerStatus = $this->customerStatusRepository->find(CustomerStatus::REGULAR);
        $Customer->setStatus($CustomerStatus);
        $this->entityManager->persist($Customer);
        $this->entityManager->flush();

        log_info('本会員登録完了');

        $event = new EventArgs(
            [
                'Customer' => $Customer,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_ENTRY_ACTIVATE_COMPLETE);

        // メール送信
        $this->mailService->sendCustomerCompleteMail($Customer);

        // Assign session carts into customer carts
        $Carts = $this->cartService->getCarts();
        $qtyInCart = 0;
        foreach ($Carts as $Cart) {
            $qtyInCart += $Cart->getTotalQuantity();
        }

        if ($qtyInCart) {
            $this->cartService->save();
        }

        return $qtyInCart;
    }

    /**
     * 通販Aceのユーザー登録を行う
     * 
     * @param \Eccube\Entity\Customer $Customer
     * @return array
     */
    private function createNewMemberOnAce(\Eccube\Entity\Customer $Customer): array
    {
        try {
            $regMemberRequest = $this->buildRegMemberRequest($Customer);
            $response = (new AceClient\AceClient)
                            ->makeMemberService()
                            ->makeRegMemberMethod()
                            ->withRequest($regMemberRequest)
                            ->send();
            if ($response->getStatusCode() === 200) {
                /** @var RegMemberResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $jmem = $responseObj->getMember()->getJmember();
                if (!empty($jmem)) {
                    $Customer->setMemId($jmem->getCode());
                }
                $message1 = $responseObj->getMember()->getMessage()->getMessage1() ?? null;
                $message2 = $responseObj->getMember()->getMessage()->getMessage2() ?? null;
            }

        } catch (\Throwable $e) {
            $message1 = $e->getMessage();
        }
        return [
            'iserror' => !empty($message1) | !empty($message2),
            'message1' => $message1,
            'message2' => $message2,
        ];
    }

    /**
     * 通販Aceの会員登録リクエストを作成する
     *
     * @param \Eccube\Entity\Customer $Customer
     * @return RegMember\RegMemberRequestModel
     */
    private function buildRegMemberRequest(\Eccube\Entity\Customer $Customer): RegMember\RegMemberRequestModel
    {   
        $jmember = (new RegMember\JmemberModel())
                        ->setSimei(mb_convert_kana($Customer->getName01() . ' ' . $Customer->getName02(), 'KVA'))
                        ->setKana(mb_convert_kana($Customer->getKana01() . ' ' . $Customer->getKana02(), 'KVA'))
                        ->setZip($Customer->getPostalCode())
                        ->setAdr1($Customer->getPref()->getName())
                        ->setAdr2($Customer->getAddr01())
                        ->setAdr3($Customer->getAddr02())
                        ->setTel($Customer->getPhoneNumber())
                        ->setFmemo1($Customer->getNote())
                        ->setUserid($Customer->getEmail())
                        ->setPasswd($Customer->getPassword())
                        ->setSex($Customer->getSex()->getId())
                        ->setBirthday($Customer->getBirth())
                        ->setPoint($Customer->getPoint())
                        ->setBikou2($Customer->getCompanyName())
                        ->setMemmail((new RegMember\MemMailModel())
                                          ->setMail($Customer->getEmail())
                                          ->setIdx(1)
                                    )
                        ->setPoint($Customer->getPoint())
                    ;
        $prm = (new RegMember\MemberPrmModel())->setJmember($jmember);
        return (new RegMember\RegMemberRequestModel())
                    ->setId(13)
                    ->setSessId($this->session->getId())
                    ->setPrm((new RegMember\MemberPrmModel())->setJmember($jmember));
    }   
}
