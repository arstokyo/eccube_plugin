<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Shukka;


/**
 * Interface for Has GoodModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelBaseInterface extends HasGNameInterface,
                                         HasSubNameInterface,
                                         NoCategory\HasKanaInterface,
                                         HasGkbnInterface,
                                         Shukka\HasSKbnInterface
{
    /**
     * Get 商品名称
     */
    public function getGname(): ?string;

    /**
     * Set 商品名称
     */
    public function setGname(?string $gname): static;

    /**
     * Get 略式名称
     */
    public function getSubName(): ?string;

    /**
     * Set 略式名称
     */
    public function setSubName(?string $subName): static;

    /**
     * Get カナ名称
     */
    public function getKana(): ?string;

    /**
     * Set カナ名称
     */
    public function setKana(?string $kana): static;

    /**
     * Get 単位
     *
     * @return ?string
     */
    public function getTani(): ?string;

    /**
     * Set 単位
     *
     * @param string|null $tani
     * @return $this
     */
    public function setTani(string|null $tani): static;

    /**
     * Get 中止区分
     *
     * @return int|null
     */
    public function getTkbn(): ?int;

    /**
     * Set 中止区分
     *
     * @param int|null $tkbn
     * @return $this
     */
    public function setTkbn(?int $tkbn): static;

    /**
     * Get 掛率区分
     *
     * @return int|null
     */
    public function getKake(): ?int;

    /**
     * Set 掛率区分
     *
     * @param int|null $kake
     * @return $this
     */
    public function setKake(?int $kake): static;

    /**
     * Get 在庫区分
     *
     * @return int|null
     */
    public function getZkbn(): ?int;

    /**
     * Set 在庫区分
     *
     * @param int|null $zkbn
     * @return $this
     */
    public function setZkbn(?int $zkbn): static;

    /**
    * Get 数量区分
    */
    public function getSkbn() : ?int;

    /**
    * Set 数量区分
    */
    public function setSkbn(?int $skbn): static;

    /**
     * Get バーコード
     *
     * @return ?string
     */
    public function getBarcode(): ?string;

    /**
     * Set バーコード
     *
     * @param ?string $barcode
     * @return $this
     */
    public function setBarcode(?string $barcode): static;
}