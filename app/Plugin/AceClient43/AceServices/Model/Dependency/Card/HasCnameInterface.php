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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Interface for Has カード名義人
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCnameInterface
{
    /**
     * Get カード名義人
     *
     * @return string|null
     */
    public function getCname(): ?string;

    /**
     * Set カード名義人
     *
     * @param string|null $cname
     *
     * @return $this
     */
    public function setCname(?string $cname);
}
