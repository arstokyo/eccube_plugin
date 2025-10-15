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
use Eccube\Entity\ProductStock;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1Interface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperOnCreateProductEvent extends Event
{
    public LoggerInterface $logger;

    public Member $creator;

    public GoodModelGroup1Interface $productModel;

    public array $productModels;

    public array $freeCodeModel;

    public ProductClass $productClass;

    public array $processedProductsClasses;

    public array $options;

    /**  商品作成を続行するかどうか。*/
    public bool $shouldBreak = false;

    /** 商品作成に失敗しました。  */
    public bool $failed = false;

    public ProductStock $productStock;

    public array $settingBag;

    public function __construct(
        ProductClass $productClass,
        ProductStock $productStock,
        GoodModelGroup1Interface $productModel,
        array $productModels,
        array $processedProductsClasses,
        Member $creator,
        LoggerInterface $logger,
        array $options,
        array $settingBag,
    ) {
        $this->productClass = $productClass;
        $this->productStock = $productStock;
        $this->productModel = $productModel;
        $this->productModels = $productModels;
        $this->processedProductsClasses = $processedProductsClasses;
        $this->logger = $logger;
        $this->creator = $creator;
        $this->options = $options;
        $this->settingBag = $settingBag;
    }
}
