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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * Hktime
     *
     * @var HktimeModel[]|null
     */
    protected ?array $hktime = null;

    /**
     * {@inheritDoc}
     */
    public function getHktime(): ?array
    {
        return $this->hktime;
    }

    /**
     * {@inheritDoc}
     */
    public function setHktime(?array $hktime): void
    {
        $this->hktime = $hktime;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'hktime' => HktimeModel::class,
        ];
    }
}
