<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V2\GetOrderListV2;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * 在庫一覧（更新日）レスポンス（ページ情報付き）
 */
interface V2GetOrderListV2ResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
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
