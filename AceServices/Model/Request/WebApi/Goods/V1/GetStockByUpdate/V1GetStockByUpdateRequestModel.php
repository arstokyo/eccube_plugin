<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GetStockByUpdate;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeFactory;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;

/**
 * WebApi v1: 更新日時で在庫を取得するためのリクエストモデル
 *
 * パラメータは services.yaml で設定された Symfony Serializer により
 * 自動的にシリアライズ（クエリパラメータ化）されます。
 * モデル側での独自シリアライズ実装は不要です。
 */
class V1GetStockByUpdateRequestModel implements V1GetStockByUpdateRequestModelInterface
{
    /** @var int システムID（必須） */
    private int $syid = 0;

    /** @var AceDateTimeInterface|null 更新開始日時（必須） */
    private ?AceDateTimeInterface $updateFrom = null;

    /** @var AceDateTimeInterface|null 更新終了日時（任意） */
    private ?AceDateTimeInterface $toDate = null;

    /** @var string|null 倉庫ID（任意、未指定時はフィルタなし） */
    private ?string $skid = null;

    /** @var int|null ページ番号（任意、1始まり） */
    private ?int $page = null;

    /** @var int|null 1ページ件数（任意、既定はサーバ側で300） */
    private ?int $limit = null;

    public function getSyid(): int
    {
        return $this->syid;
    }

    public function setSyid(int $syid): self
    {
        $this->syid = $syid;

        return $this;
    }

    public function getUpdateFrom(): string
    {
        return $this->updateFrom->toWebApiDateTime();
    }

    public function setUpdateFrom(\DateTimeInterface $from): self
    {
        $this->updateFrom = AceDateTimeFactory::makeAceDateTime($from);

        return $this;
    }

    public function getToDate(): ?string
    {
        return $this->toDate ? $this->toDate->toWebApiDateTime() : null;
    }

    public function setToDate(?\DateTimeInterface $to): self
    {
        $this->toDate = $to ? AceDateTimeFactory::makeAceDateTime($to) : null;

        return $this;
    }

    public function getSkid(): ?string
    {
        return $this->skid;
    }

    public function setSkid(?string $skid): self
    {
        $this->skid = $skid;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * 必須パラメータの検証
     *
     * @throws \InvalidArgumentException
     */
    public function ensureParameterNotMissing(): void
    {
        if ($this->syid <= 0) {
            throw new \InvalidArgumentException('syid は必須です（0より大きい数値）。');
        }
        if ($this->updateFrom === null) {
            throw new \InvalidArgumentException('updateFrom は必須です。');
        }
        // toDate, skid, page, limit は任意
    }

    public function fetchRequestNodeName(): string
    {
        return 'GetStockByUpdate';
    }
}
