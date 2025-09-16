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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Interface for Has 明細備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMBikouInterface
{
    /**
     * Get 明細備考
     *
     * @return string|null
     */
    public function getMbikou(): ?string;

    /**
     * Set 明細備考
     *
     * @param string|null $mbikou
     *
     * @return $this
     */
    public function setMbikou(?string $mbikou);
}
