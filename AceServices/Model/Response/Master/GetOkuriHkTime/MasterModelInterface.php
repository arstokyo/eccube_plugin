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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Master Model for Okuri Hk Time Response
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
     * Get Okuri
     *
     * @return OkuriHkTimeModel[]|null
     */
    public function getOkuri(): ?array;

    /**
     * Set Okuri
     *
     * @param OkuriHkTimeModel[]|null
     *
     * @return void
     */
    public function setOkuri(?array $Okuri): void;
}
