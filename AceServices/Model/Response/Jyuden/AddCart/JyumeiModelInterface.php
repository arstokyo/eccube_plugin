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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for JyumeiModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Jyumei\JyumeiModelGroup2Interface, Jyumei\JyumeiModelGroup3Interface, Zaiko\HasIgnoreZaikoInterface, Zaiko\HasZaikoInterface
{
    public function setSupportSpid(string $supportSpid): void;

    public function getSupportSpid(): array;

    public function setSupportProvider(string $supportProvider): void;

    public function getSupportProvider(): array;

    public function setSupportSpidQty(string $supportSpidQty): void;

    public function getSupportSpidQty(): array;

    public function setSupportSummary(string $supportSummary): void;

    public function getSupportSummary(): array;

    public function setItemType(string $itemType): void;

    public function getItemType(): string;
}
