<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

/**
 * Interface For 3つ代表者電話番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFiveFdenwaBangoInterface
{
    /**
     * Get 代表者電話番号1
     *
     * @return ?string
     */
    public function getFreeDenwaBango1(): ?string;

    /**
     * Set 代表者電話番号1
     *
     * @param ?string $freedenwabango1
     * @return $this
     */
    public function setFreeDenwaBango1(?string $freedenwabango1);

    /**
     * Get 代表者電話番号2
     *
     * @return ?string
     */
    public function getFreeDenwaBango2(): ?string;

    /**
     * Set 代表者電話番号2
     *
     * @param ?string $freedenwabango2
     * @return $this
     */
    public function setFreeDenwaBango2(?string $freedenwabango2);

    /**
     * Get 代表者電話番号3
     *
     * @return ?string
     */
    public function getFreeDenwaBango3(): ?string;

    /**
     * Set 代表者電話番号3
     *
     * @param ?string $freedenwabango3
     * @return $this
     */
    public function setFreeDenwaBango3(?string $freedenwabango3);
}