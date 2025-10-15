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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V2\GetOrderListV2;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

/**
 * Interface for JyumeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Rireki\RirekiModelLevel2Interface, Tax\HasTaxInterface, Tax\HasTaxKbnInterface
{
    /**
     * Get Tax Rate
     *
     * @return float
     */
    public function getTaxRate(): float;

    /**
     * Set Tax Rate
     *
     * @param float $taxRate
     *
     * @return self
     */
    public function setTaxRate(float $taxRate): self;

    /**
     * Get Name
     *
     * @return ?string
     */
    public function getName(): ?string;

    /**
     * Set Name
     *
     * @param ?string $name
     *
     * @return self
     */
    public function setName(?string $name): self;
}
