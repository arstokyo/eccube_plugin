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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Class HanpuSecondModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuSecondModel implements HanpuSecondModelInterface
{
    use Handen\HandenModelGroup1Trait;

    /** @var ?int サイト(日単位) */
    protected ?int $siteday = null;

    /**
     * {@inheritDoc}
     */
    public function getSiteday(): ?int
    {
        return $this->siteday;
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteday(?int $siteday)
    {
        $this->siteday = $siteday;

        return $this;
    }
}
