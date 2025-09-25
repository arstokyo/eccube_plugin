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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Reminder;

/**
 * Interface for Has 答え
 *
 * @author Ars-Thong kmorino
 */
interface HasAnswerInterface
{
    /**
     * Get 答え
     *
     * @return ?string
     */
    public function getAnswer(): ?string;

    /**
     * Set 答え
     *
     * @param ?string $answer
     *
     * @return $this
     */
    public function setAnswer(?string $answer);
}
