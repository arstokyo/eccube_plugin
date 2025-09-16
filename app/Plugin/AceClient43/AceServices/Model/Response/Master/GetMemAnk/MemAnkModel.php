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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnk;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class MemAnkModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemAnkModel implements MemAnkModelInterface
{
    use NoCategory\MbidTrait;
    use NoCategory\KubunTrait;

    /** @var ?int 回答番号 */
    protected ?int $ansno = null;

    /** @var ?string アンケートID */
    protected ?string $ansid = null;

    /**
     * {@inheritDoc}
     */
    public function getAnsno(): ?int
    {
        return $this->ansno;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsno(?int $ansno)
    {
        $this->ansno = $ansno;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnsid(): ?string
    {
        return $this->ansid;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsid(?string $ansid)
    {
        $this->ansid = $ansid;

        return $this;
    }
}
