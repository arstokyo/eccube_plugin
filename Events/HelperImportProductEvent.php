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

use Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoods\MasterModelInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperImportProductEvent extends Event
{
    public array $createProducts;

    public MasterModelInterface $master;

    public OutputInterface $output;

    public array $options;

    public function __construct(array $createProducts, MasterModelInterface $master, OutputInterface $output, array $options)
    {
        $this->createProducts = $createProducts;
        $this->master = $master;
        $this->output = $output;
        $this->options = $options;
    }
}
