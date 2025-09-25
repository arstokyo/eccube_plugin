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

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodTankaModelGroup1Interface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperImportProductEvent extends Event
{
    public array $createProducts;

    /** @var GoodTankaModelGroup1Interface[] */
    public array $tankaModels;

    /** @var GoodModelGroup1Interface[] */
    public array $productModels;

    public LoggerInterface $logger;

    public array $options;

    /**
     * @param array $createProducts
     * @param GoodModelGroup1Interface[] $productModels
     * @param GoodTankaModelGroup1Interface[] $tankaModels
     * @param LoggerInterface $logger
     * @param array $options
     */
    public function __construct(array $createProducts, array $productModels, array $tankaModels, LoggerInterface $logger, array $options)
    {
        $this->createProducts = $createProducts;
        $this->productModels = $productModels;
        $this->tankaModels = $tankaModels;
        $this->logger = $logger;
        $this->options = $options;
    }
}
