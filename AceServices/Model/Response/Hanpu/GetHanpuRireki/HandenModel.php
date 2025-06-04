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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Class for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Handen\HandenModelGroup1Trait;
    use Handen\HandenModelGroup2Trait;
    use Denpyo\DennoTrait;
    use Card\CedaTrait;

    /** @var ?int 現在回数 */
    protected ?int $nowcnt = null;

    /**
     * Hanmei
     *
     * @var HanmeiModel
     */
    protected ?HanmeiModel $hanmei = null;

    /**
     * {@inheritDoc}
     */
    public function getNowcnt(): ?int
    {
        return $this->nowcnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setNowcnt(?int $nowcnt)
    {
        $this->nowcnt = $nowcnt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanmei(): ?HanmeiModel
    {
        return $this->hanmei;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanmei(?HanmeiModel $hanmei): void
    {
        $this->hanmei = $hanmei;
    }
}
