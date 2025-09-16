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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Message ModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MessageModelExtend2Interface extends MessageModelExtend1Interface, NoCategory\HasTaikaiInterface, NoCategory\HasCodeInterface
{
    /**
     * Get メールアドレス
     */
    public function getAdress(): ?string;

    /**
     * Set メールアドレス
     *
     * @param ?string $adress
     *
     * @return $this
     */
    public function setAdress(?string $adress);
}
