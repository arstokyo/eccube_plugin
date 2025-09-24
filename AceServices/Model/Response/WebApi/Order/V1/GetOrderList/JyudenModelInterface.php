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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

/**
 * Interface for JyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyudenModelInterface extends Rireki\RirekiModelLevel1Interface, Payment\HasPnameInterface, Haiso\HaisoModelGroup1Interface, Good\HasGtotalInterface, Cost\Souryou\HasSouryouInterface, Cost\Tesuu\HasTesuuInterface, Cost\Nebiki\HasNebikiInterface, Cost\HasTotalInterface, Day\HasSdayInterface, Day\HasUdayInterface, Day\HasNdayInterface, Denpyo\HasZandakaInterface, Cost\HasSyoukeiInterface
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
    public function setTotal(?string $total);

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

    /**
     * Get FreeFields
     *
     * @return ?FreeFieldsModel
     */
    public function getFreeFields(): ?FreeFieldsModel;

    /**
     * Set FreeFields
     *
     * @param ?FreeFieldsModel $freeFields
     * @return self
     */
    public function setFreeFields(?FreeFieldsModel $freeFields): self;
}
