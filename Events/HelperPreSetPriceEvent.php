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

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperPreSetPriceEvent extends Event
{
    public ?OutputInterface $output = null;

    public array $options;

    public bool $continue = true;

    public ?\Closure $sortFunction = null;

    /** @var GoodTankaModelGroup1Interface[] */
    public array $tankaModels;

    public array $groupedTankaModels;

    public function __construct(
        array $tankaModels,
        array $groupedTankaModels,
        array $options,
        ?OutputInterface $output,
    ) {
        $this->options = $options;
        $this->tankaModels = $tankaModels;
        $this->groupedTankaModels = $groupedTankaModels;
        $this->output = $output;
    }
}
