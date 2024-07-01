<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\Free\HasFreeGroup1Interface;

/**
 * Interface For HasFreeGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeGroup2Interface extends HasFreeGroup1Interface
{
    /**
     * Get 決済種別種類
     *
     * @return ?int
     */
    public function getKessaishubetsu(): ?int;

    /**
     * Set 決済種別種類
     *
     * @param ?int $kessaishubetsu
     * @return $this
     */
    public function setKessaishubetsu(?int $kessaishubetsu): static;

    /**
     * Get 送料区分
     *
     * @return ?int
     */
    public function getFreesouryoukubun(): ?int;

    /**
     * Set 送料区分
     *
     * @param ?int $freesouryoukubun
     * @return $this
     */
    public function setFreesouryoukubun(?int $freesouryoukubun): static;

    /**
     * Get 表示区分ID
     *
     * @return ?string
     */
    public function getFreedispkbnid(): ?string;

    /**
     * Set 表示区分ID
     *
     * @param ?string $freedispkbnid
     * @return $this
     */
    public function setFreedispkbnid(?string $freedispkbnid): static;

    /**
     * Get 表示区分名
     *
     * @return ?string
     */
    public function getFreedispkbnname(): ?string;

    /**
     * Set 表示区分名
     *
     * @param ?string $freedispkbnname
     * @return $this
     */
    public function setFreedispkbnname(?string $freedispkbnname): static;
}