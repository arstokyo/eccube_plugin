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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailJyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Interface For MailJyudenModelLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MailJyudenModelLevel1Interface extends Mail\HasMailInterface
{
    /**
     * Get 注文コメント(お客様)
     *
     * @return ?string
     */
    public function getTbikou(): ?string;

    /**
     * Set 注文コメント(お客様)
     *
     * @param ?string $tbikou
     *
     * @return $this
     */
    public function setTbikou(?string $tbikou);
}
