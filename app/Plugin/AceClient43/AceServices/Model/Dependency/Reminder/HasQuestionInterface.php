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
 * Interface for Has 質問
 *
 * @author kmorino
 */
interface HasQuestionInterface
{
    /**
     * Get 質問
     *
     * @return ?string
     */
    public function getQuestion(): ?string;

    /**
     * Set 質問
     *
     * @param ?string $question1
     *
     * @return $this
     */
    public function setQuestion(?string $question);
}
