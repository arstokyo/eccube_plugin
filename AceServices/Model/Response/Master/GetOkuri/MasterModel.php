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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuri;

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
     * Okuri
     *
     * @var OkuriModel[]|null
     */
    protected ?array $okuri = null;

    /**
     * {@inheritDoc}
     */
    public function getOkuri(): ?array
    {
        return $this->okuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkuri(?array $okuri): void
    {
        $this->okuri = $okuri;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'okuri' => OkuriModel::class,
        ];
    }
}
