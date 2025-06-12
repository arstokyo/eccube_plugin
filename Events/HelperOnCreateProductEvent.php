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
use Plugin\AceClient43\AceServices\Model\Dependency\Good\GoodModelGroup1Interface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperOnCreateProductEvent extends Event
{
    public OutputInterface $output;

    public Member $creator;

    public GoodModelGroup1Interface $productModel;

    public array $productModels;

    public ProductClass $productClass;

    public array $processedProductsClasses;

    public array $options;

    /**  商品作成を続行するかどうか。*/
    public bool $shouldBreak = false;

    /** 商品作成に失敗しました。  */
    public bool $failed = false;

    public function __construct(
        ProductClass $productClass,
        GoodModelGroup1Interface $productModel,
        array $productModels,
        array $processedProductsClasses,
        Member $creator,
        ?OutputInterface $output,
        array $options,
    ) {
        $this->productClass = $productClass;
        $this->productModel = $productModel;
        $this->productModels = $productModels;
        $this->processedProductsClasses = $processedProductsClasses;
        $this->output = $output;
        $this->creator = $creator;
        $this->options = $options;
    }
}
