<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Repository\Master\SexRepository;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode as GetMemberMcodeRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki as GetRirekiRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki\GetRirekiRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail\GetRirekiDetailRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;

class CustomerDataConverter implements CustomerDataConverterInterface
{
    use CreateRequestModelTrait;

    protected SexRepository $sexRepository;

    protected PrefRepository $prefRepository;

    protected CustomerAceNormalizerInterface $normalizer;

    public function __construct(
        SexRepository $sexRepository,
        PrefRepository $prefRepository,
        CustomerAceNormalizerInterface $normalizer,
    ) {
        $this->sexRepository = $sexRepository;
        $this->prefRepository = $prefRepository;
        $this->normalizer = $normalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerToJmember(Customer $customer, array $options = []): RegMember\JmemberModelInterface
    {
        /** @var RegMember\JmemberModelInterface $jmemberModel */
        $jmemberModel = $this->createSubModel(RegMember\JmemberModelInterface::class);

        /** @var RegMember\MemMailModel $memMailModel */
        $memMailModel = $this->createSubModel(RegMember\MemMailModel::class);
        $memMailModel
            ->setMail($customer->getEmail())
            ->setIdx(1);

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
    public function convertCustomerToRegMemberRequest(Customer $customer, string $syid, array $options = []): RegMember\RegMemberRequestModelInterface
    {
        $jmember = $this->convertCustomerToJmember($customer, $options);

        /** @var RegMember\RegMemberRequestModelInterface $request */
        $request = $this->createRequestModel(RegMember\RegMemberRequestModelInterface::class);

        /** @var RegMember\MemberPrmModelInterface $prmModel */
        $prmModel = $this->createSubModel(RegMember\MemberPrmModelInterface::class);
        $prmModel->setJmember($jmember);

        return $request
            ->setId($syid)
            ->setPrm($prmModel)
            ->setSessId(session_id());
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
            ->setPoint($jmember->getPoint())
            ->setAceCustomerId($jmember->getCode());

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
            ->setPostalCode($jmember->getZip() ?? '')
            ->setAddr01($jmember->getAdr2() ?? '')
            ->setAddr02($jmember->getAdr3() ?? '')
            ->setPhoneNumber($jmember->getTel() ?? '')
            ->setEmail($email)
            ->setBirth($jmember->getBirthday() ? $jmember->getBirthday()->toDateTime() : null)
            ->setCompanyName($jmember->getBikou2())
            ->setAceCustomerId($jmember->getCode());

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
            ->setDispRow(100)
            ->setDispPage(1)
            ->setSort(0);
    }

    public function convertCustomerToGetRirekiDetailRequest(string $aceCustomerId, string $orderId, string $syid): GetRirekiDetailRequestModelInterface
    {
        /** @var GetRirekiDetailRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(GetRirekiDetailRequestModelInterface::class);

        return $requestModel
            ->setId($syid)
            ->setMcode($aceCustomerId)
            ->setDenno($orderId)
            ->setDenku(10);
    }
}
