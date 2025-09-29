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

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Repository\CustomerAddressRepository;
use Eccube\Repository\Master\PrefRepository;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr as RequestRegMemAdr;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;

class CustomerAddressDataConverter implements CustomerAddressDataConverterInterface
{
    use CreateRequestModelTrait;

    /**
     * @var CustomerAddressRepository
     */
    protected $customerAddressRepository;

    /**
     * @var PrefRepository
     */
    protected $prefRepository;

    /**
     * @var CustomerAceNormalizerInterface
     */
    protected $normalizer;

    public function __construct(
        CustomerAddressRepository $customerAddressRepository,
        PrefRepository $prefRepository,
        CustomerAceNormalizerInterface $normalizer,
    ) {
        $this->customerAddressRepository = $customerAddressRepository;
        $this->prefRepository = $prefRepository;
        $this->normalizer = $normalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerAddressToRegMemAdrRequest(CustomerAddress $address, string $syid, array $options = []): RegMemAdrRequestModel
    {
        $customer = $address->getCustomer();

        $fullName = $this->normalizer->formatAceFullNameFromEcName($address->getName01(), $address->getName02());
        $fullKana = $this->normalizer->formatAceFullNameFromEcName($address->getKana01(), $address->getKana02());

        /** @var RegMemAdrRequestModel $requestModel */
        $requestModel = $this->createRequestModel(RequestRegMemAdr\RegMemAdrRequestModelInterface::class);

        /** @var RequestRegMemAdr\MemberPrmModel $prmModel */
        $prmModel = $this->createSubModel(RequestRegMemAdr\MemberPrmModelInterface::class);

        /** @var RequestRegMemAdr\NmemberModel $nmemberModel */
        $nmemberModel = $this->createSubModel(RequestRegMemAdr\NmemberModelInterface::class);

        $nmemberModel
            ->setCode($customer->getAceCustomerId())
            ->setEda($address->getAceEdaNo())
            ->setZip($address->getPostalCode())
            ->setAdr1($address->getPref() ? $address->getPref()->getName() : '')
            ->setAdr2($address->getAddr01() ?? '')
            ->setAdr3($address->getAddr02() ?? '')
            ->setTel($address->getPhoneNumber() ?? '')
            ->setSimei($fullName)
            ->setKana($fullKana)
            ->setBikou1($fullKana);

        $prmModel->setNmember($nmemberModel);

        return $requestModel
            ->setId($syid)
            ->setPrm($prmModel);
    }

    /**
     * {@inheritdoc}
     */
    public function convertCustomerAddressToDeleteRequest(Customer $customer, CustomerAddress $address, string $syid, array $options = []): DeleteHaisoAdrsRequestModel
    {
        /** @var DeleteHaisoAdrsRequestModel $requestModel */
        $requestModel = $this->createRequestModel(DeleteHaisoAdrsRequestModelInterface::class);

        return $requestModel
            ->setId($syid)
            ->setMcode($customer->getAceCustomerId())
            ->setEda($address->getAceEdaNo());
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
     * {@inheritdoc}
     */
    public function convertCustomerAddressAceToEntity(GetHaisouAdrsModelInterface $aceCustomerAddress, Customer $customer): CustomerAddress
    {
        $customerAddress = $this->customerAddressRepository->findOneBy(['Customer' => $customer, 'ace_eda_no' => $aceCustomerAddress->getEda()]);
        $pref = $this->prefRepository->findOneBy(['name' => $aceCustomerAddress->getAdr1()]);

        if (!$customerAddress) {
            $customerAddress = new CustomerAddress();
            $customerAddress->setCreateDate(new \DateTime());
        }

        [$name01, $name02] = $this->normalizer->parseAceFullNameToParts($aceCustomerAddress->getSimei(), 'name');
        [$kana01, $kana02] = $this->normalizer->parseAceFullNameToParts($aceCustomerAddress->getKana(), 'kana');

        $customerAddress->setAceEdaNo($aceCustomerAddress->getEda());
        $customerAddress->setCustomer($customer);
        $customerAddress->setName01($name01);
        $customerAddress->setName02($name02);
        $customerAddress->setKana01($kana01);
        $customerAddress->setKana02($kana02);
        $customerAddress->setPref($pref);
        $customerAddress->setPostalCode($aceCustomerAddress->getZipEccubeFormat());
        $customerAddress->setAddr01($aceCustomerAddress->getAdr2());
        $customerAddress->setAddr02($aceCustomerAddress->getAdr3());
        $customerAddress->setPhoneNumber($aceCustomerAddress->getTel());

        return $customerAddress;
    }
}
