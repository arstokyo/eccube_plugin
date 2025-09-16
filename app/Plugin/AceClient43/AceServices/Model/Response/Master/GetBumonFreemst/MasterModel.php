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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFreemst;

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
     * Freemst
     *
     * @var FreemstModel[]|null
     */
    protected ?array $freemst = null;

    /**
     * {@inheritDoc}
     */
    public function getFreemst(): ?array
    {
        return $this->freemst;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreemst(?array $freemst): void
    {
        $this->freemst = $freemst;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Freemst' => FreemstModel::class,
        ];
    }
}
