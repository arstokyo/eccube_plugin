<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Repository\Master\SexRepository;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode as GetMemberMcodeRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode\GetMemberMcodeRequestModelInterface;
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

    public function __construct(
        SexRepository $sexRepository,
        PrefRepository $prefRepository,
    ) {
        $this->sexRepository = $sexRepository;
        $this->prefRepository = $prefRepository;
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
            ->setSimei($this->formatFullName($customer->getName01(), $customer->getName02()))
            ->setKana($this->formatFullName($customer->getKana01(), $customer->getKana02()))
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
    public function convertGetMemberToCustomer(GetMember\LoginMemberModelInterface $aceCustomer, Customer $customer, array $options = []): Customer
    {
        $jmember = $aceCustomer->getMember();

        // Parse and set name
        $this->parseAndSetName($jmember->getName1(), $jmember->getName2(), $customer);

        // Parse and set kana
        $this->parseAndSetKana($jmember->getKana1(), $jmember->getKana2(), $customer);

        // Set basic information
        $customer
            ->setPostalCode($jmember->getZipEccubeFormat())
            ->setAddr01($jmember->getAdr2())
            ->setAddr02($jmember->getAdr3())
            ->setPhoneNumber($jmember->getTel())
            ->setEmail($jmember->getUserid())
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
    public function convertGetMemberMcodeToCustomer(GetMemberMcode\LoginMemberModelInterface $aceCustomer, Customer $customer, array $options = []): Customer
    {
        $jmember = $aceCustomer->getMember();

        // Parse and set name from full name
        $this->parseAndSetFullName($jmember->getSimei(), $customer, 'name');

        // Parse and set kana from full kana
        $this->parseAndSetFullName($jmember->getKana(), $customer, 'kana');

        // Set basic information
        $customer
            ->setPostalCode($jmember->getZip() ?? '')
            ->setAddr01($jmember->getAdr2() ?? '')
            ->setAddr02($jmember->getAdr3() ?? '')
            ->setPhoneNumber($jmember->getTel() ?? '')
            ->setEmail($jmember->getUserid() ?? '')
            ->setBirth($jmember->getBirthday())
            ->setAceCustomerId($jmember->getCode());

        // Set sex
        $this->setSex($jmember->getSex(), $customer);

        // Set prefecture
        $this->setPrefecture($jmember->getAdr1(), $customer);

        return $customer;
    }

    /**
     * Format full name for ACE
     *
     * @param string|null $name01
     * @param string|null $name02
     *
     * @return string
     */
    protected function formatFullName(?string $name01, ?string $name02): string
    {
        return mb_convert_kana(sprintf('%s　%s', $name01 ?? '', $name02 ?? ''), 'KVA');
    }

    /**
     * Parse and set name from individual components
     *
     * @param string|null $name01
     * @param string|null $name02
     * @param Customer $customer
     */
    protected function parseAndSetName(?string $name01, ?string $name02, Customer $customer): void
    {
        $customer->setName01($name01 ?? '');
        $customer->setName02($name02 ?? '');
    }

    /**
     * Parse and set kana from individual components
     *
     * @param string|null $kana01
     * @param string|null $kana02
     * @param Customer $customer
     */
    protected function parseAndSetKana(?string $kana01, ?string $kana02, Customer $customer): void
    {
        $customer->setKana01($kana01 ?? '');
        $customer->setKana02($kana02 ?? '');
    }

    /**
     * Parse and set full name from combined string
     *
     * @param string|null $fullName
     * @param Customer $customer
     * @param string $type
     */
    protected function parseAndSetFullName(?string $fullName, Customer $customer, string $type): void
    {
        if (!$fullName) {
            if ($type === 'name') {
                $customer->setName01('');
                $customer->setName02('');
            } else {
                $customer->setKana01('');
                $customer->setKana02('');
            }

            return;
        }

        $nameParts = explode('　', $fullName);
        $firstName = isset($nameParts[0]) ? trim($nameParts[0]) : '';
        $lastName = isset($nameParts[1]) ? trim($nameParts[1]) : '';

        if ($type === 'name') {
            $customer->setName01($firstName);
            $customer->setName02($lastName);
        } else {
            $customer->setKana01($firstName);
            $customer->setKana02($lastName);
        }
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
     * @param Customer $customer
     * @param string $syid
     * @param array $options
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
}
