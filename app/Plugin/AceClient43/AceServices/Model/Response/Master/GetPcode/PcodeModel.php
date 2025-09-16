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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetPcode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class PcodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class PcodeModel implements PcodeModelInterface
{
    use NoCategory\CodeTrait;
    use NoCategory\NameTrait;

    /** @var ?string 入金予定方法の通販プロ上の説明 */
    protected ?string $pcodeSyurui = null;

    /** @var ?string Web公開区分 */
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
