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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Interface MailJyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MailJyudenModelInterface extends Mail\HasMailInterface
{
    /**
     * Get 伝票メール情報
     *
     * @return ?string
     */
    public function getTbikou(): ?string;

    /**
     * Set 伝票メール情報
     *
     * @param ?string $tbikou
     *
     * @return $this
     */
    public function setTbikou(?string $tbikou);
}
