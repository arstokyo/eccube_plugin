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

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Member;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreImportProductEvent extends Event
{
    public bool $continue = true;

    public \DateTime $updateFrom;

    public \DateTime $updateTo;

    public InputInterface $input;

    public LoggerInterface $logger;

    public Member $creator;

    public array $options;

    public ?int $chunkIndex;

    public ?int $totalChunks;

    public ?int $repeatRound;

    public function __construct(Member $creator, \DateTime $updateFrom, \DateTime $updateTo, InputInterface $input, LoggerInterface $logger, array $options, ?int $chunkIndex = null, ?int $totalChunks = null, ?int $repeatRound = null)
    {
        $this->updateFrom = $updateFrom;
        $this->updateTo = $updateTo;
        $this->input = $input;
        $this->logger = $logger;
        $this->creator = $creator;
        $this->options = $options;
        $this->chunkIndex = $chunkIndex;
        $this->totalChunks = $totalChunks;
        $this->repeatRound = $repeatRound;
    }

    public function isRepeatRound(): bool
    {
        return $this->repeatRound !== null;
    }

    public function isFirstChunkOfRepeatRound(): bool
    {
        return $this->chunkIndex === 0;
    }

    public function shouldSkipImportMaster(): bool
    {
        // Import master only for the first chunk of each repeat round
        return $this->isRepeatRound() && !$this->isFirstChunkOfRepeatRound();
    }
}
