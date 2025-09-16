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

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\AceServices\Model\CustomDataType;
use Symfony\Component\Serializer\Attribute\Ignore;

/**
 * Interface for PrmModelRequest.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelInterface extends CustomDataType\EnsureParameterNotMissingInterface
{
    /**
     * Get Serialize Format
     *
     * @Ignore()
     *
     * @return string
     */
    public function getSerializeFormat(): string;

    /**
     * Get Serialize Options
     *
     * @Ignore()
     *
     * @return array
     */
    public function getSerializeOptions(): array;
}
