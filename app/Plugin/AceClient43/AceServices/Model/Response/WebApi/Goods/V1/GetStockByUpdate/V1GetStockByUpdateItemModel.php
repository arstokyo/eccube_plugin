<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate;

/**
 * WebApi v1: 更新日時で在庫を取得するレスポンス項目モデル
 */
class V1GetStockByUpdateItemModel
{
    /** @var string 商品ID */
    private string $gdid = '';

    /** @var int 在庫数 */
    private int $zaiko = 0;

    public function getGdid(): string
    {
        return $this->gdid;
    }

    public function setGdid(string $gdid): self
    {
        $this->gdid = $gdid;

        return $this;
    }

    public function getZaiko(): int
    {
        return $this->zaiko;
    }

    public function setZaiko(int $zaiko): self
    {
        $this->zaiko = $zaiko;

        return $this;
    }
}
