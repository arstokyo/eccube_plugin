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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Response;

/**
 * Master Model for Okuri Hk Time Response
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var OkuriHkTimeModelInterface[]|null Okuri
     */
    private ?array $Okuri = null;

    /**
     * {@inheritDoc}
     */
    public function getOkuri(): ?array
    {
        return $this->Okuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setOkuri(?array $okuri): void
    {
        $this->Okuri = $okuri;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'Okuri' => OkuriHkTimeModel::class,
        ];
    }
}
