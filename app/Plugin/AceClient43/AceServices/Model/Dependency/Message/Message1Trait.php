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
 * Trait for エラーメッセージ1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait Message1Trait
{
    /**
     * エラーメッセージ 1
     *
     * @var ?string
     */
    protected ?string $message1 = null;

    /**
     * {@inheritDoc}
     */
    public function getMessage1(): ?string
    {
        return $this->message1;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage1(?string $message1)
    {
        $this->message1 = $message1;

        return $this;
    }
}
