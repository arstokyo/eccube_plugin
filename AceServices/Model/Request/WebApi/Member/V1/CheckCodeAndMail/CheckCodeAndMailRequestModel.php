<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Member\V1\CheckCodeAndMail;

/**
 * WebApi v1: メールおよびコードの存在を確認するためのリクエストモデル
 *
 * パラメータは services.yaml で設定された Symfony Serializer により
 * 自動的にシリアライズ（クエリパラメータ化）されます。
 * モデル側での独自シリアライズ実装は不要です。
 */
class CheckCodeAndMailRequestModel implements CheckCodeAndMailRequestModelInterface
{
    /** @var string システムID（必須） */
    protected string $syid;

    /** @var string 会員コード */
    protected string $mcode;

    /** @var string メール */
    protected string $mail;

    /** @var int ステータス */
    protected int $status = 0;

    /**
     * {@inheritDoc}
     */
    public function getSyid(): string
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(string $syid): self
    {
        $this->syid = $syid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMcode(): ?string
    {
        return $this->mcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setMcode(?array $mcode): self
    {
        $mcodeString = implode(',', $mcode);
        $this->mcode = $mcodeString;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail(?array $mail): self
    {
        $mailString = implode(',', $mail);
        $this->mail = $mailString;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * 必須パラメータの検証
     *
     * @throws \InvalidArgumentException
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->syid)) {
            throw new \InvalidArgumentException('syid は必須です（空文字列は不可）。');
        }
    }

    public function fetchRequestNodeName(): string
    {
        return 'CheckCodeAndMail';
    }
}
