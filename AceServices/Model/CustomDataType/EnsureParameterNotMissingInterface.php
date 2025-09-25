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

namespace Plugin\AceClient43\AceServices\Model\CustomDataType;

use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Interface for ensureParameterNotMissing.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface EnsureParameterNotMissingInterface
{
    /**
     * Ensure Request Parameter Not Missing
     *
     * @return void
     *
     * @throws MissingRequestParameterException
     */
    public function ensureParameterNotMissing(): void;
}
