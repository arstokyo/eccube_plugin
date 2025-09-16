<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * 在庫一覧（更新日）レスポンス（ページ情報付き）
 */
interface V1GetStockByUpdateResponseModelInterface extends ResponseModelInterface, AsListDenormalizableInterface
{
    /**
     * @return V1GetStockByUpdateItemModel[] 項目リスト
     */
    public function getItems(): array;

    /**
     * @param V1GetStockByUpdateItemModel[] $items 項目リスト
     */
    public function setItems(array $items): self;

    /** 現在のページ番号 */
    public function getPage(): int;

    public function setPage(int $page): self;

    /** 1ページ件数 */
    public function getLimit(): int;

    public function setLimit(int $limit): self;

    /** 次ページが存在するかどうか */
    public function getHasMore(): bool;

    public function setHasMore(bool $hasMore): self;

    /**
     * 総件数（hasMore が true の場合、未知を表す -1 が返る場合があります）
     */
    public function getTotalHit(): int;

    public function setTotalHit(int $totalHit): self;
}
