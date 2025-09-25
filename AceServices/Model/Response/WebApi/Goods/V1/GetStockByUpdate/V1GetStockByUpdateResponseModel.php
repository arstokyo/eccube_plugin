<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate;

/**
 * WebApi v1: 更新日時で在庫を取得するレスポンスモデル（ページ情報付き）
 *
 * 備考:
 * - 本APIは { items: [...], page: 1, limit: 300, hasMore: true, totalHit: -1|N } の形式で返却されます。
 * - デフォルトのシリアライザでプロパティバインドされる想定です。
 */
class V1GetStockByUpdateResponseModel implements V1GetStockByUpdateResponseModelInterface
{
    /** @var V1GetStockByUpdateItemModel[] 項目リスト */
    private array $Items = [];

    /** @var int 現在のページ番号 */
    private int $page = 1;

    /** @var int 1ページ件数 */
    private int $limit = 300;

    /** @var bool 次ページが存在するか */
    private bool $hasMore = false;

    /** @var int 総件数（不明時は -1） */
    private int $totalHit = -1;

    /**
     * @return V1GetStockByUpdateItemModel[] 項目リスト
     */
    public function getItems(): array
    {
        return $this->Items;
    }

    /**
     * @param V1GetStockByUpdateItemModel[] $Items 項目リスト
     */
    public function setItems(array $Items): self
    {
        $this->Items = $Items;

        return $this;
    }

    /** 現在のページ番号を取得 */
    public function getPage(): int
    {
        return $this->page;
    }

    /** 現在のページ番号を設定 */
    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /** 1ページ件数を取得 */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /** 1ページ件数を設定 */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /** 次ページが存在するかどうかを取得 */
    public function getHasMore(): bool
    {
        return $this->hasMore;
    }

    /** 次ページが存在するかどうかを設定 */
    public function setHasMore(bool $hasMore): self
    {
        $this->hasMore = $hasMore;

        return $this;
    }

    /** 総件数を取得（不明時は -1） */
    public function getTotalHit(): int
    {
        return $this->totalHit;
    }

    /** 総件数を設定 */
    public function setTotalHit(int $totalHit): self
    {
        $this->totalHit = $totalHit;

        return $this;
    }

    public static function fetchAsListProperty(): array
    {
        return [
            'Items' => V1GetStockByUpdateItemModel::class,
        ];
    }
}
