<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cvs;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\OrderIdTrait;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\TelTrait;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Model for CVS Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CvsModelGroup1 implements CvsModelGroup1Interface
{
    use OrderIdTrait,
        TelTrait;

    /** @var string|null $serviceoptiontype 決済サービスオプション */
    protected ?string $serviceoptiontype = null;

    /** @var int|null $amount 金額 */
    protected ?int $amount = null;

    /** @var string|null $name1 氏名１ */
    protected ?string $name1 = null;

    /** @var string|null $name2 氏名２ */
    protected ?string $name2 = null;

    /** @var AceDateTime\AceDateTime|null $paylimit 支払期限 */
    protected ?AceDateTime\AceDateTime $paylimit = null;

    /** @var string|null $mstatus 処理結果コード */
    protected ?string $mstatus = null;

    /** @var string|null $vresultcode 詳細結果コード */
    protected ?string $vresultcode = null;

    /** @var string|null $receiptno 受付番号 */
    protected ?string $receiptno = null;

    /**
     * {@inheritDoc}
     */
    public function getServiceoptiontype(): ?string
    {
        return $this->serviceoptiontype;
    }

    /**
     * {@inheritDoc}
     */
    public function setServiceoptiontype(?string $serviceoptiontype)
    {
        $this->serviceoptiontype = $serviceoptiontype;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount(?int $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName1(): ?string
    {
        return $this->name1;
    }

    /**
     * {@inheritDoc}
     */
    public function setName1(?string $name1)
    {
        $this->name1 = $name1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName2(): ?string
    {
        return $this->name2;
    }

    /**
     * {@inheritDoc}
     */
    public function setName2(?string $name2)
    {
        $this->name2 = $name2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPaylimit(): ?AceDateTime\AceDateTime
    {
        return $this->paylimit;
    }

    /**
     * {@inheritDoc}
     */
    public function setPaylimit($paylimit)
    {
        $this->paylimit = AceDateTime\AceDatetimeFactory::makeAceDateTime($paylimit, 'Y/m/d');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMstatus(): ?string
    {
        return $this->mstatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setMstatus(?string $mstatus)
    {
        $this->mstatus = $mstatus;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getVresultcode(): ?string
    {
        return $this->vresultcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setVresultcode(?string $vresultcode)
    {
        $this->vresultcode = $vresultcode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getReceiptno(): ?string
    {
        return $this->receiptno;
    }

    /**
     * {@inheritDoc}
     */
    public function setReceiptno(?string $receiptno)
    {
        $this->receiptno = $receiptno;
        return $this;
    }
    
}