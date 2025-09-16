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
 * Trait for 答え
 *
 * @author kmorino
 */
trait AnswerTrait
{
    /** @var ?string 答え */
    protected ?string $answer = null;

    /**
     * {@inheritDoc}
     */
    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnswer(?string $answer)
    {
        $this->answer = $answer;

        return $this;
    }
}
