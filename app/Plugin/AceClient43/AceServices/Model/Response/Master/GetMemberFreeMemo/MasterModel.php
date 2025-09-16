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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFreeMemo;

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
     * FreeMemo
     *
     * @var FreeMemoModel[]|null
     */
    protected ?array $freeMemo = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeMemo(): ?array
    {
        return $this->freeMemo;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeMemo(?array $freeMemo): void
    {
        $this->freeMemo = $freeMemo;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'FreeMemo' => FreeMemoModel::class,
        ];
    }
}
