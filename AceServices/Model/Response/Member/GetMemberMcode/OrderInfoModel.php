<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient\AceServices\Model\Response\Member\GetMember\OrderInfoModelInterface;

/**
 * Model for OrderInfo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class OrderInfoModel implements OrderInfoModelInterface
{
    /** @var ?int $nomoneyFlg 未入金フラグ */
    protected ?int $nomoneyFlg = null;

    /** @var ?int $orderCnt 購入回数 */
    protected ?int $orderCnt = null;

    /** @var int|string|null $orderMaxday 最新購入日 */
    protected string|int|null $orderMaxday = null;

    /**
     * {@inheritDoc}
     */
    public function getNomoneyFlg(): ?int
    {
        return $this->nomoneyFlg;
    }

    /**
     * {@inheritDoc}
     */
    public function setNomoneyFlg(?int $nomoneyFlg)
    {
        $this->nomoneyFlg = $nomoneyFlg;
        return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getOrderCnt(): ?int
    {
        return $this->orderCnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderCnt(?int $orderCnt)
    {
        $this->orderCnt = $orderCnt;
        return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getOrderMaxday(): string|int|null
    {
        return $this->orderMaxday;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderMaxday(string|int|null $orderMaxday)
    {
        $this->orderMaxday = $orderMaxday;
        return $this;
    }
}