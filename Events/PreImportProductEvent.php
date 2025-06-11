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
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreImportProductEvent extends Event
{
    public bool $continue = true;

    private \DateTime $updateFrom;

    private \DateTime $updateTo;

    private InputInterface $input;

    private OutputInterface $output;

    private Member $creator;

    private array $options = [];

    public function __construct(Member $creator, \DateTime $updateFrom, \DateTime $updateTo, InputInterface $input, OutputInterface $output, array $options = [])
    {
        $this->updateFrom = $updateFrom;
        $this->updateTo = $updateTo;
        $this->input = $input;
        $this->output = $output;
        $this->creator = $creator;
        $this->options = $options;
    }

    public function getUpdateFrom(): \DateTime
    {
        return $this->updateFrom;
    }

    public function getUpdateTo(): \DateTime
    {
        return $this->updateTo;
    }

    public function getInput(): InputInterface
    {
        return $this->input;
    }

    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    public function getCreator(): Member
    {
        return $this->creator;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}
