<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Rireki;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Interface for RirekiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelInterface extends Rireki\RirekiModelLevel1Interface,
                                       Payment\HasPnameInterface,
                                       Haiso\HaisoModelGroup1Interface,
                                       Good\HasGtotalInterface,
                                       Cost\Souryou\HasSouryouInterface,
                                       Cost\Tesuu\HasTesuuInterface,
                                       Cost\Nebiki\HasNebikiInterface,
                                       Cost\HasTotalInterface,
                                       Day\HasSdayInterface,
                                       Day\HasUdayInterface,
                                       Day\HasNdayInterface,
                                       Denpyo\HasZandakaInterface,
                                       Cost\HasSyoukeiInterface
{
    /**
     * Get 行番号
     *
     * @return ?int
     */
    public function getRno(): ?int;

    /**
     * Set 行番号
     *
     * @param ?int $rno
     */
    public function setRno(?int $rno);

    /**
     * Get 行数
     *
     * @return ?int
     */
    public function getMaxrow(): ?int;

    /**
     * Set 行数
     *
     * @param ?int $maxrow
     */
    public function setMaxrow(?int $maxrow);

    /**
     * Get 伝票合計額
     */
    public function getTotal(): ?float;

    /**
     * Set 伝票合計額
     */
    public function setTotal(?string $total): static;

    /**
     * Get URL
     *
     * @return ?string
     */
    public function getUrl(): ?string;

    /**
     * Set URL
     *
     * @param ?string $url
     */
    public function setUrl(?string $url);

}