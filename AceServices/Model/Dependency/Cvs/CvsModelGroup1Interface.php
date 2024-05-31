<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cvs;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasOrderIdInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\HasTelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;

/**
 * Interface for CSV Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CvsModelGroup1Interface extends HasOrderIdInterface, HasTelInterface
{

    /**
     * {@inheritDoc}
     */
    #[SerializedName('telno')]
    public function setTel(?string $tel): static;

    /**
     * Get 決済サービスオプション
     * 
     * @return string|null
     */
    public function getServiceoptiontype(): ?string;

    /**
     * Set 決済サービスオプション
     * 
     * @param string|null $serviceoptiontype
     * @return $this
     */
    public function setServiceoptiontype(?string $serviceoptiontype): static;

    /**
     * Get 金額
     * 
     * @return int|null
     */
    public function getAmount(): ?int;

    /**
     * Set 金額
     * 
     * @param int|null $amount
     * @return $this
     */
    public function setAmount(?int $amount): static;

    /**
     * Get 氏名１
     * 
     * @return string|null
     */
    public function getName1(): ?string;

    /**
     * Set 氏名１
     * 
     * @param string|null $name1
     * @return $this
     */
    public function setName1(?string $name1): static;

    /**
     * Get 氏名２
     * 
     * @return string|null
     */
    public function getName2(): ?string;

    /**
     * Set 氏名２
     * 
     * @param string|null $name2
     * @return $this
     */
    public function setName2(?string $name2): static;

    /**
     * Get 支払期限
     * 
     * @return AceDateTimeInterface|null
     */
    public function getPaylimit(): ?AceDateTimeInterface;

    /**
     * Set 支払期限
     * 
     * @param \Datetime|string|null $paylimit
     * @return $this
     */
    public function setPaylimit(\Datetime|string|null $paylimit): static;

    /**
     * Get 処理結果コード
     * 
     * @return string|null
     */
    public function getMstatus(): ?string;

    /**
     * Set 処理結果コード
     * 
     * @param string|null $mstatus
     * @return $this
     */
    public function setMstatus(?string $mstatus): static;

    /**
     * Get 詳細結果コード
     * 
     * @return string|null
     */
    public function getVresultcode(): ?string;

    /**
     * Set 詳細結果コード
     * 
     * @param string|null $vresultcode
     * @return $this
     */
    public function setVresultcode(?string $vresultcode): static;

    /**
     * Get 受付番号
     * 
     * @return string|null
     */
    public function getReceiptno(): ?string;

    /**
     * Set 受付番号
     * 
     * @param string|null $receiptno
     * @return $this
     */
    public function setReceiptno(?string $receiptno): static;

}