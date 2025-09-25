<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * WebApi v1: 注文一覧を取得するためのリクエストインターフェース
 */
interface V1GetOrderListRequestModelInterface extends RequestModelInterface
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

    /** オプション */
    public function getOptions(): ?string;

    /** オプション */
    public function setOptions($options): self;
}
