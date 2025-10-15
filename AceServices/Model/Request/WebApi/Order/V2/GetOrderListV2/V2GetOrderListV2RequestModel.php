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

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * WebApi v2: 注文一覧を取得するためのリクエストモデル
 *
 * パラメータは services.yaml で設定された Symfony Serializer により
 * 自動的にシリアライズ（クエリパラメータ化）されます。
 * モデル側での独自シリアライズ実装は不要です。
 */
class V2GetOrderListV2RequestModel implements V2GetOrderListV2RequestModelInterface
{
    /** @var string システムID（必須） */
    protected string $syid;

    /** @var string 会員コード（必須） */
    protected string $mcode;

    /** @var int 伝票区分（必須） */
    protected int $denku = 0;

    /** @var int 表示行数（必須） */
    protected int $dispRow = 0;

    /** @var int 表示ページ（必須） */
    protected int $dispPage = 0;

    /** @var int|null 伝票番号（オプション） */
    protected ?int $denno = null;

    /** @var int|null ソート順（オプション） */
    protected ?int $sort = null;

    /** @var string|null 開始日（dayFrom） */
    #[SerializedName('dayFrom')]
    protected ?string $dayFrom = null;

    /** @var string|null 終了日（dayTo） */
    #[SerializedName('dayTo')]
    protected ?string $dayTo = null;

    /** @var string|null オプション */
    #[SerializedName('options')]
    protected ?string $options = null;

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
    public function getMcode(): string
    {
        return $this->mcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setMcode(string $mcode): self
    {
        $this->mcode = $mcode;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenku(): int
    {
        return $this->denku;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenku(int $denku): self
    {
        $this->denku = $denku;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDispRow(): int
    {
        return $this->dispRow;
    }

    /**
     * {@inheritDoc}
     */
    public function setDispRow(int $dispRow): self
    {
        $this->dispRow = $dispRow;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDispPage(): int
    {
        return $this->dispPage;
    }

    /**
     * {@inheritDoc}
     */
    public function setDispPage(int $dispPage): self
    {
        $this->dispPage = $dispPage;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenno(): ?int
    {
        return $this->denno;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenno(?int $denno): self
    {
        $this->denno = $denno;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSort(): ?int
    {
        return $this->sort;
    }

    /**
     * {@inheritDoc}
     */
    public function setSort(?int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDayFrom(): ?string
    {
        return $this->dayFrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayFrom(?string $dayFrom): self
    {
        $this->dayFrom = $dayFrom;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDayTo(): ?string
    {
        return $this->dayTo;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayTo(?string $dayTo): self
    {
        $this->dayTo = $dayTo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): ?string
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions($options): self
    {
        if ($options instanceof OptionsModelInterface) {
            $this->options = $options->getOptionsJson();
        } else {
            $this->options = $options;
        }

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
        if (empty($this->mcode)) {
            throw new \InvalidArgumentException('mcode は必須です。');
        }
        if ($this->denku <= 0) {
            throw new \InvalidArgumentException('denku は必須です（0より大きい数値）。');
        }
        if ($this->dispRow <= 0) {
            throw new \InvalidArgumentException('dispRow は必須です（0より大きい数値）。');
        }
        if ($this->dispPage <= 0) {
            throw new \InvalidArgumentException('dispPage は必須です（0より大きい数値）。');
        }
        if ($this->sort !== null && !in_array($this->sort, [0, 1], true)) {
            throw new \InvalidArgumentException('sort は 0 または 1 のみ許可されます。');
        }
    }

    public function fetchRequestNodeName(): string
    {
        return 'GetOrderListV2';
    }
}
