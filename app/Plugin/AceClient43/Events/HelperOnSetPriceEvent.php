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
use Eccube\Entity\ProductClass;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperOnSetPriceEvent extends Event
{
    public ?OutputInterface $output = null;

    public array $settingBag;

    public array $options;

    /** @var GoodTankaModelGroup1Interface[] */
    public array $currentModels;

    /** @var <string,GoodTankaModelGroup1Interface[]> */
    public array $groupedTankaModels;

    public GoodTankaModelGroup1Interface $firstTankaModel;

    public Member $creator;

    public ProductClass $productClass;

    public bool $break = false;

    public function __construct(
        ProductClass $productClass,
        Member $creator,
        array $groupedTankaModels,
        array $currentModels,
        GoodTankaModelGroup1Interface $firstTankaModel,
        array $settingBag,
        array $options,
        ?OutputInterface $output,
    ) {
        $this->productClass = $productClass;
        $this->creator = $creator;
        $this->groupedTankaModels = $groupedTankaModels;
        $this->currentModels = $currentModels;
        $this->firstTankaModel = $firstTankaModel;
        $this->settingBag = $settingBag;
        $this->options = $options;
        $this->output = $output;
    }
}
