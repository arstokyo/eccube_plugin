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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHktime;

use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Class HktimeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HktimeModel implements HktimeModelInterface
{
    use Haiso\HkCodeTrait;
    use Haiso\HkNameTrait;

    /** @var ?int 時間 */
    protected ?int $hktime = null;

    /**
     * {@inheritDoc}
     */
    public function getHktime(): ?int
    {
        return $this->hktime;
    }

    /**
     * {@inheritDoc}
     */
    public function setHktime(?int $hktime)
    {
        $this->hktime = $hktime;

        return $this;
    }
}
