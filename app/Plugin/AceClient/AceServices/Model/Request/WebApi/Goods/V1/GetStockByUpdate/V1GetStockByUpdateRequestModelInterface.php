<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GetStockByUpdate;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * WebApi v1: 更新日時で在庫を取得するためのリクエストインターフェース
 */
interface V1GetStockByUpdateRequestModelInterface extends RequestModelInterface
{
    /** システムID（必須） */
    public function getSyid(): int;

    public function setSyid(int $syid): self;

    /** 更新開始日時（必須） */
    public function getUpdateFrom(): string;

    public function setUpdateFrom(\DateTimeInterface $from): self;

    /** 更新終了日時（任意） */
    public function getToDate(): ?string;

    public function setToDate(?\DateTimeInterface $to): self;

    /** 倉庫ID（任意） */
    public function getSkid(): ?string;

    public function setSkid(?string $skid): self;

    /** ページ番号（任意） */
    public function getPage(): ?int;

    public function setPage(?int $page): self;

    /** 1ページ件数（任意） */
    public function getLimit(): ?int;

    public function setLimit(?int $limit): self;
}
