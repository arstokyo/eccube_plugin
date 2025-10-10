<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Member\V1\CheckCodeAndMail;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * WebApi v1: メールおよびコードの存在を確認するためのリクエストインターフェース
 */
interface CheckCodeAndMailRequestModelInterface extends RequestModelInterface
{
    /** システムID（必須） */
    public function getSyid(): string;

    public function setSyid(string $syid): self;

    /** 会員コード */
    public function getMcode(): ?string;

    public function setMcode(?array $mcode): self;

    /** メール */
    public function getMail(): ?string;

    public function setMail(?array $mail): self;

    /** ステータス */
    public function getStatus(): ?int;

    public function setStatus(?int $status): self;
}
