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

namespace Plugin\AceClient43\Converter;

use Eccube\Entity\Customer;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Repository\Master\SexRepository;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode as GetMemberMcodeRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki as GetRirekiRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki\GetRirekiRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail as GetRirekiDetailRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail\GetRirekiDetailRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Request\Member\UpdatePassword\UpdatePasswordRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList\V1GetOrderListRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2\OptionsModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2\V2GetOrderListV2RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\Corrector\RegMemberRequestCorrectorApplier;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;

class CustomerDataConverter implements CustomerDataConverterInterface
{
    use CreateRequestModelTrait;

    protected SexRepository $sexRepository;

    protected PrefRepository $prefRepository;

    protected CustomerAceNormalizerInterface $normalizer;

    protected RegMemberRequestCorrectorApplier $regMemberRequestCorrectorApplier;

    public function __construct(
        SexRepository $sexRepository,
        PrefRepository $prefRepository,
        CustomerAceNormalizerInterface $normalizer,
        RegMemberRequestCorrectorApplier $regMemberRequestCorrectorApplier,
    ) {
        $this->sexRepository = $sexRepository;
        $this->prefRepository = $prefRepository;
        $this->normalizer = $normalizer;
        $this->regMemberRequestCorrectorApplier = $regMemberRequestCorrectorApplier;
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerToJmember(Customer $customer, array $options = []): RegMember\JmemberModelInterface
    {
        /** @var RegMember\JmemberModelInterface $jmemberModel */
        /** @var RegMember\JmemberModelInterface $jmemberModel */
        /** @var RegMember\MemMailChildModelInterface $memMailChildModel */
        /** @var RegMember\MemMailChildModelInterface[] $memMailChildModels */
        /** @var RegMember\MemMailModelInterface $memMailModel */
        $jmemberModel = $this->createSubModel(RegMember\JmemberModelInterface::class);
        $memMailModel = $this->createSubModel(RegMember\MemMailModelInterface::class);
        $memMailChildModel = $this->createSubModel(RegMember\MemMailChildModelInterface::class);

        $memMailChildModel->setMail($customer->getEmail())
            ->setIdx(1);
        $memMailModel->setMemmailChild([$memMailChildModel]);

        $jmember = $jmemberModel
            ->setSimei($this->normalizer->formatAceFullNameFromEcName($customer->getName01(), $customer->getName02()))
            ->setKana($this->normalizer->formatAceFullNameFromEcName($customer->getKana01(), $customer->getKana02()))
            ->setZip($customer->getPostalCode())
            ->setAdr1($customer->getPref() ? $customer->getPref()->getName() : '')
            ->setAdr2($customer->getAddr01() ?? '')
            ->setAdr3($customer->getAddr02() ?? '')
            ->setTel($customer->getPhoneNumber() ?? '')
            ->setUserid($customer->getEmail())
            ->setSexByClass($customer->getSex())
            ->setBirthday($customer->getBirth())
            ->setPoint((int) $customer->getPoint() ?? 0)
            ->setPasswd($customer->getPassword())
            ->setMemmail($memMailModel);

        // Set ACE customer ID for updates
        if ($customer->getAceCustomerId()) {
            $jmember->setCode($customer->getAceCustomerId());
        }

        return $jmember;
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerToRegMemberRequest(Customer $customer, RegMemberFlow $flow, string $syid, array $options = []): RegMember\RegMemberRequestModelInterface
    {
        $jmember = $this->convertCustomerToJmember($customer, $options);

        /** @var RegMember\RegMemberRequestModelInterface $request */
        $request = $this->createRequestModel(RegMember\RegMemberRequestModelInterface::class);

        /** @var RegMember\MemberPrmModelInterface $prmModel */
        $prmModel = $this->createSubModel(RegMember\MemberPrmModelInterface::class);
        $prmModel->setJmember($jmember);

        $request = $request
            ->setId($syid)
            ->setPrm($prmModel)
            ->setSessId(session_id());

        if ($this->regMemberRequestCorrectorApplier->hasCorrectors()) {
            $this->regMemberRequestCorrectorApplier->apply($request, $customer, $flow, $options);
        }

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function convertGetMemberToCustomer(GetMember\LoginMemberModelInterface $aceCustomer, ?Customer $customer = null, array $options = []): Customer
    {
        $customer = $customer ?? new Customer();
        $jmember = $aceCustomer->getMember();

        // Parse and set full-name/kana using normalizer
        $this->normalizer->parseAceFullNameToEc($jmember->getSimei(), $customer, 'name');
        $this->normalizer->parseAceFullNameToEc($jmember->getKana(), $customer, 'kana');

        // Resolve email: prefer UserId if it is a valid email, otherwise use Mail
        $email = $jmember->resolveEmail();

        // Set basic information
        $customer
            ->setPostalCode($jmember->getZipEccubeFormat())
            ->setAddr01($jmember->getAdr2())
            ->setAddr02($jmember->getAdr3())
            ->setPhoneNumber($jmember->getTel())
            ->setEmail($email)
            ->setBirth($jmember->getBirthday() ? $jmember->getBirthday()->toDateTime() : null)
            ->setPoint($jmember->getPointAsString())
            ->setAceCustomerId($jmember->getCode())
            ->setPoint($aceCustomer->getStPoint()->getPointAsString())
        ;

        // Set sex
        $this->setSex($jmember->getSex(), $customer);

        // Set prefecture
        $this->setPrefecture($jmember->getAdr1(), $customer);

        return $customer;
    }

    /**
     * {@inheritdoc}
     */
    public function convertGetMemberMcodeToCustomer(GetMemberMcode\LoginMemberModelInterface $loginMemberModel, ?Customer $customer = null, array $options = []): Customer
    {
        $customer = $customer ?? new Customer();
        $jmember = $loginMemberModel->getMember();

        // Parse and set full-name/kana using normalizer
        $this->normalizer->parseAceFullNameToEc($jmember->getSimei(), $customer, 'name');
        $this->normalizer->parseAceFullNameToEc($jmember->getKana(), $customer, 'kana');

        // Resolve email: prefer UserId if it is a valid email, otherwise use Mail
        $email = $jmember->resolveEmail();

        // Set basic information
        $customer
            ->setPostalCode($jmember->getZipEccubeFormat())
            ->setAddr01($jmember->getAdr2() ?? '')
            ->setAddr02($jmember->getAdr3() ?? '')
            ->setPhoneNumber($jmember->getTel() ?? '')
            ->setEmail($email)
            ->setBirth($jmember->getBirthday() ? $jmember->getBirthday()->toDateTime() : null)
            ->setCompanyName($jmember->getBikou2())
            ->setAceCustomerId($jmember->getCode())
            ->setPoint($loginMemberModel->getStPoint()->getPointAsString())
        ;

        // Set sex
        $this->setSex($jmember->getSex(), $customer);

        // Set prefecture
        $this->setPrefecture($jmember->getAdr1(), $customer);

        return $customer;
    }

    /**
     * Set sex based on ACE sex value
     *
     * @param mixed $sexValue
     * @param Customer $customer
     */
    protected function setSex($sexValue, Customer $customer): void
    {
        if ($sexValue) {
            $sex = $this->sexRepository->find($sexValue);
            if ($sex) {
                $customer->setSex($sex);
            }
        }
    }

    /**
     * Set prefecture based on prefecture name
     *
     * @param string|null $prefName
     * @param Customer $customer
     */
    protected function setPrefecture(?string $prefName, Customer $customer): void
    {
        if ($prefName) {
            $pref = $this->prefRepository->findOneBy(['name' => $prefName]);
            if ($pref) {
                $customer->setPref($pref);
            }
        }
    }

    /**
     * @param string $aceCustomerId
     * @param string $syid
     * @param array $options
     * @param Customer|null $customer
     *
     * @return GetMemberMcodeRequestModelInterface
     *
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    public function convertCustomerToGetMemberMcodeRequest(string $aceCustomerId, string $syid, array $options = [], ?Customer $customer = null): GetMemberMcodeRequestModelInterface
    {
        /** @var GetMemberMcodeRequestModelInterface $requestModel */
        /** @var GetMemberMcodeRequest\IdPrmModelInterface $prmModel */
        $requestModel = $this->createRequestModel(GetMemberMcodeRequestModelInterface::class);
        $prmModel = $this->createSubModel(GetMemberMcodeRequest\IdPrmModelInterface::class);

        $prmModel->setSyid($syid);

        return $requestModel
            ->setIdPrm($prmModel)
            ->setMcode($aceCustomerId);
    }

    public function convertCustomerToGetRirekiRequest(string $aceCustomerId, string $syid): GetRirekiRequestModelInterface
    {
        /** @var GetRirekiRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(GetRirekiRequestModelInterface::class);

        $idPrmModel = $this->createSubModel(GetRirekiRequest\IdPrmModelInterface::class);
        $idPrmModel->setSyid($syid);

        return $requestModel
            ->setIdPrm($idPrmModel)
            ->setMcode($aceCustomerId)
            ->setDispRow(1000)
            ->setDispPage(1)
            ->setSort(0);
    }

    public function convertCustomerToGetRirekiDetailRequest(string $aceCustomerId, string $orderId, string $syid): GetRirekiDetailRequestModelInterface
    {
        /** @var GetRirekiDetailRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(GetRirekiDetailRequestModelInterface::class);

        $idPrmModel = $this->createSubModel(GetRirekiDetailRequest\IdPrmModelInterface::class);
        $idPrmModel->setSyid($syid);

        return $requestModel
            ->setIdPrm($idPrmModel)
            ->setMcode($aceCustomerId)
            ->setDenno($orderId)
            ->setDenku(10);
    }

    public function convertCustomerToGetOrderListRequest(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0): V1GetOrderListRequestModelInterface
    {
        /** @var V1GetOrderListRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(V1GetOrderListRequestModelInterface::class);

        return $requestModel
            ->setSyid($syid)
            ->setMcode($aceCustomerId)
            ->setDispRow($limit)
            ->setDispPage($page)
            ->setDenno($denno)
            ->setDenku(V1GetOrderListRequestModelInterface::DENKU_ORDER)
            ->setSort($sort)
        ;
    }

    public function convertCustomerToGetOrderListV2Request(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0, ?string $dayFrom = null, ?string $dayTo = null, array $options = []): V2GetOrderListV2RequestModelInterface
    {
        // 検索パラメータを抽出
        $searchName = $options['search_name'] ?? null;
        $jdFreeKubuns = $options['jd_free_kubuns'] ?? null;

        /** @var V2GetOrderListV2RequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(V2GetOrderListV2RequestModelInterface::class);

        // オプションモデルを作成し設定
        $optionsModel = $this->createSubModel(OptionsModelInterface::class);

        if ($searchName) {
            $optionsModel->setSearchName($searchName);
        }

        if ($jdFreeKubuns) {
            $optionsModel->setReturnJdFreeKubuns($jdFreeKubuns);
        }

        return $requestModel
            ->setSyid($syid)
            ->setMcode($aceCustomerId)
            ->setDispRow($limit)
            ->setDispPage($page)
            ->setDenno($denno)
            ->setDenku(V2GetOrderListV2RequestModelInterface::DENKU_ORDER)
            ->setSort($sort)
            ->setDayFrom($dayFrom)
            ->setDayTo($dayTo)
            ->setOptions($optionsModel)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerToUpdatePasswordRequest(Customer $customer, string $syid, array $options = []): UpdatePasswordRequestModelInterface
    {
        /** @var UpdatePasswordRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(UpdatePasswordRequestModelInterface::class);

        $password = null;
        if (isset($options['set_plain_password']) && $options['set_plain_password']) {
            $password = $customer->getPlainPassword();
        } else {
            $password = $customer->getPassword();
        }

        return $requestModel
            ->setSyid($syid)
            ->setMbid($customer->getAceCustomerId())
            ->setPasswd($password);
    }
}
