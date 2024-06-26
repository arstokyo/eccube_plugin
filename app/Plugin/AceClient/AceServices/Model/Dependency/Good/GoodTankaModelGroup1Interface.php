<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for GoodTankaModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodTankaModelGroup1Interface extends Cost\Tanka\HasTankaKbnInterface,
                                                Day\HasDayInterface,
                                                Cost\Tax\HasTaxKbnInterface,
                                                Point\HasPointInterface,
                                                Day\HasNdayInterface,
                                                HasGdidInterface
{

    /**
     * Get 税率
     *
     * @return ?float
     */
    public function getTaxrate(): ?float;

    /**
     * Set 税率
     *
     * @param string|null $taxrate
     * @return $this
     */
    public function setTaxrate(string|null $taxrate): static;

    /**
     * Get 税込単価
     *
     * @return ?float
     */
    public function getInctanka(): ?float;

    /**
     * Set 税込単価
     *
     * @param string|null $inctanka
     * @return $this
     */
    public function setInctanka(string|null $inctanka): static;

    /**
     * Get 税抜単価
     *
     * @return ?float
     */
    public function getRevtanka(): ?float;

    /**
     * Set 税抜単価
     *
     * @param string|null $revtanka
     * @return $this
     */
    public function setRevtanka(string|null $revtanka): static;

    /**
     * Get 備考
     *
     * @return ?string
     */
    public function getNote(): ?string;

    /**
     * Set 備考
     *
     * @param ?string $note
     * @return $this
     */
    public function setNote(?string $note): static;

    /**
     * Get 次回税率
     *
     * @return ?float
     */
    public function getNtaxrate(): ?float;

    /**
     * Set 次回税率
     *
     * @param string|null $ntaxrate
     * @return $this
     */
    public function setNtaxrate(string|null $ntaxrate): static;

    /**
     * Get 次回税込単価
     *
     * @return ?float
     */
    public function getNinctanka(): ?float;

    /**
     * Set 次回税込単価
     *
     * @param string|null $ninctanka
     * @return $this
     */
    public function setNinctanka(string|null $ninctanka): static;

    /**
     * Get 次回税抜単価
     *
     * @return ?float
     */
    public function getNrevtanka(): ?float;

    /**
     * Set 次回税抜単価
     *
     * @param string|null $nrevtanka
     * @return $this
     */
    public function setNrevtanka(string|null $nrevtanka): static;

    /**
     * Get 次回税区分
     *
     * @return ?int
     */
    public function getNtaxkbn(): ?int;

    /**
     * Set 次回税区分
     *
     * @param ?int $ntaxkbn
     * @return $this
     */
    public function setNtaxkbn(?int $ntaxkbn): static;

    /**
     * Get 次回ポイント
     *
     * @return ?int
     */
    public function getNpoint(): ?int;

    /**
     * Set 次回ポイント
     *
     * @param ?int $npoint
     * @return $this
     */
    public function setNpoint(?int $npoint): static;

    /**
     * Get 次回備考
     *
     * @return ?string
     */
    public function getNnote(): ?string;

    /**
     * Set 次回備考
     *
     * @param ?string $nnote
     * @return $this
     */
    public function setNnote(?string $nnote): static;
}