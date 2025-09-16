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
     * Pcode
     *
     * @var PcodeModel[]|null
     */
    protected ?array $pcode = null;

    /**
     * {@inheritDoc}
     */
    public function getPcode(): ?array
    {
        return $this->pcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcode(?array $pcode): void
    {
        $this->pcode = $pcode;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'pcode' => PcodeModel::class,
        ];
    }
}
