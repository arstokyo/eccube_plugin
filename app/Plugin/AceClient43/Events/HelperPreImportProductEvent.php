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
use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods\MasterModelInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperPreImportProductEvent extends Event
{
    public OutputInterface $output;

    public Member $creator;

    public \DateTime $updateFrom;

    public \DateTime $updateTo;

    public array $options;

    public MasterModelInterface $masterModel;

    public bool $continue = true;

    public int $importCount = 0;

    public function __construct(MasterModelInterface $master, \DateTime $updateFrom, \DateTime $updateTo, Member $creator, ?OutputInterface $output, array $options = [])
    {
        $this->masterModel = $master;
        $this->updateFrom = $updateFrom;
        $this->updateTo = $updateTo;
        $this->output = $output;
        $this->creator = $creator;
        $this->options = $options;
    }
}
