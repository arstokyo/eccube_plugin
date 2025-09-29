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

/**
 * Trait for エラーメッセージ 2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait Message2Trait
{
    /**
     * エラーメッセージ 2
     *
     * @var ?string
     */
    protected ?string $message2 = null;

    /**
     * {@inheritDoc}
     */
    public function getMessage2(): ?string
    {
        return $this->message2;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage2(?string $message2)
    {
        $this->message2 = $message2;

        return $this;
    }
}
