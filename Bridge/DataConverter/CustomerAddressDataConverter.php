<?php

namespace Plugin\AceClient43\Bridge\DataConverter;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr as RequestRegMemAdr;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;

class CustomerAddressDataConverter implements CustomerAddressDataConverterInterface
{
    use CreateRequestModelTrait;

    /**
     * {@inheritdoc}
     */
    public function convertCustomerAddressToRegMemAdrRequest(CustomerAddress $address, string $syid, array $options = []): RegMemAdrRequestModel
    {
        $customer = $address->getCustomer();
        $fullName = $this->formatFullName($address->getName01(), $address->getName02());
        $fullKana = $this->formatFullName($address->getKana01(), $address->getKana02());

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
}
