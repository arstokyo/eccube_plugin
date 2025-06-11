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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetFreeCdWithName;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Class MasterModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MasterModel implements AsListDenormalizableInterface, HasMessageModelInterface
{
    use HasMessageModelTrait;

    /**
     * Free Cd
     *
     * @var FreeCodeModel[]|null
     */
    protected ?array $freeCd = null;

    /**
     * Getフリーコード
     *
     * @return FreeCodeModel[]|null
     */
    public function getFreeCd(): ?array
    {
        return $this->freeCd;
    }

    /**
     * Setフリーコード
     *
     * @param array|null $freeCd
     *
     * @return $this
     */
    public function setFreeCd(?array $freeCd)
    {
        $this->freeCd = $freeCd;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'FreeCd' => FreeCodeModel::class,
        ];
    }
}
