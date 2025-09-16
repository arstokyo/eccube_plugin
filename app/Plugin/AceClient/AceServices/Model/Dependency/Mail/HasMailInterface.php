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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Interface for Has メール
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMailInterface
{
    /**
     * Get メール
     *
     * @return ?string
     */
    public function getMail(): ?string;

    /**
     * Set メール
     *
     * @param ?string $mail
     *
     * @return $this
     */
    public function setMail(?string $mail);
}
