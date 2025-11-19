<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * WebApi v2: 注文一覧を取得するためのリクエストインターフェース
 */
interface V2GetOrderListV2RequestModelInterface extends RequestModelInterface
{
    public const DENKU_ORDER = 10;

    /** システムID（必須） */
    public function getSyid(): string;

    public function setSyid(string $syid): self;

    /** 会員コード */
    public function getMcode(): string;

    public function setMcode(string $mcode): self;

    /** 伝票区分 */
    public function getDenku(): int;

    public function setDenku(int $denku): self;

    /** 表示行数 */
    public function getDispRow(): int;

    public function setDispRow(int $dispRow): self;

    /** 表示ページ */
    public function getDispPage(): int;

    public function setDispPage(int $dispPage): self;

    /** 伝票番号（オプション） */
    public function getDenno(): ?int;

    public function setDenno(?int $denno): self;

    /** ソート順（オプション） */
    public function getSort(): ?int;

    public function setSort(?int $sort): self;

    /** 開始日 (dayFrom) */
    public function getDayFrom(): ?string;

    public function setDayFrom(?string $dayFrom): self;

    /** 終了日 (dayTo) */
    public function getDayTo(): ?string;

    public function setDayTo(?string $dayTo): self;

    /** オプション */
    public function getOptions(): ?string;

    /** オプション */
    public function setOptions($options): self;
}
