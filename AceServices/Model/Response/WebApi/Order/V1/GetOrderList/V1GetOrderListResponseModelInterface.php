<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * 在庫一覧（更新日）レスポンス（ページ情報付き）
 */
interface V1GetOrderListResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return OrderModel[]
     */
    public function getOrder(): array;

    /**
     * @param OrderModel[] $order
     *
     * @return self
     */
    public function setOrder(array $order): self;

    /**
     * @return int
     */
    public function getTotalPage(): int;

    /**
     * @param int $totalPage
     *
     * @return self
     */
    public function setTotalPage(int $totalPage): self;

    /**
     * @return int
     */
    public function getTotalRow(): int;

    /**
     * @param int $totalRow
     *
     * @return self
     */
    public function setTotalRow(int $totalRow): self;
}
