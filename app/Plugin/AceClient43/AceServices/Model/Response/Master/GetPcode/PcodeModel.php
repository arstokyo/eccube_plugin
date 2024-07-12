<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetPcode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class PcodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class PcodeModel implements PcodeModelInterface
{
    use NoCategory\CodeTrait,
        NoCategory\NameTrait;

    /** @var ?string $pcodeSyurui 入金予定方法の通販プロ上の説明 */
    protected ?string $pcodeSyurui = null;

    /** @var ?string $memo Web公開区分 */
    protected ?string $memo = null;

    /**
     * {@inheritDoc}
     */
    public function getPcodeSyurui(): ?string
    {
        return $this->pcodeSyurui;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcodeSyurui(?string $pcodeSyurui)
    {
        $this->pcodeSyurui = $pcodeSyurui;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemo(?string $memo)
    {
        $this->memo = $memo;
        return $this;
    }
}