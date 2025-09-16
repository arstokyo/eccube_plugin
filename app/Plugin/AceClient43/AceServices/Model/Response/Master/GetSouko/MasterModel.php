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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetSouko;

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
     * Souko
     *
     * @var SoukoModel[]|null
     */
    protected ?array $souko = null;

    /**
     * {@inheritDoc}
     */
    public function getSouko(): ?array
    {
        return $this->souko;
    }

    /**
     * {@inheritDoc}
     */
    public function setSouko(?array $souko): void
    {
        $this->souko = $souko;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'souko' => SoukoModel::class,
        ];
    }
}
