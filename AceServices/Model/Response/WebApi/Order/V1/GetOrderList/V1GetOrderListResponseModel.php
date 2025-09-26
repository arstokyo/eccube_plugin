<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList;

/**
 * Model for V1GetOrderListResponse
 */
class V1GetOrderListResponseModel implements V1GetOrderListResponseModelInterface
{
    /** @var OrderModel[] */
    protected array $order = [];

    /** @var int */
    protected int $totalPage = 0;

    /** @var int */
    protected int $totalRow = 0;

    /**
     * {@inheritDoc}
     */
    public function getOrder(): array
    {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(array $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalPage(): int
    {
        return $this->totalPage;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalPage(int $totalPage): self
    {
        $this->totalPage = $totalPage;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalRow(): int
    {
        return $this->totalRow;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalRow(int $totalRow): self
    {
        $this->totalRow = $totalRow;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Order' => OrderModel::class,
        ];
    }
}
