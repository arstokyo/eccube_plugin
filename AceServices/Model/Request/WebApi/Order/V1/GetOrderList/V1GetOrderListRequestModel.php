<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * WebApi v1: 注文一覧を取得するためのリクエストモデル
 *
 * パラメータは services.yaml で設定された Symfony Serializer により
 * 自動的にシリアライズ（クエリパラメータ化）されます。
 * モデル側での独自シリアライズ実装は不要です。
 */
class V1GetOrderListRequestModel implements V1GetOrderListRequestModelInterface
{
    /** @var string システムID（必須） */
    private string $syid = null;

    /** @var string 会員コード（必須） */
    private string $mcode = null;

    /** @var int 伝票区分（必須） */
    private int $denku = 0;

    /** @var int 表示行数（必須） */
    private int $dispRow = 0;

    /** @var int 表示ページ（必須） */
    private int $dispPage = 0;

    /** @var int|null 伝票番号（オプション） */
    private ?int $denno = null;

    /** @var int|null ソート順（オプション） */
    private ?int $sort = null;

    /** @var string|null オプション */
    #[SerializedName("options")]
    private ?string $options = null;


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
        return 'GetOrderList';
    }
}
