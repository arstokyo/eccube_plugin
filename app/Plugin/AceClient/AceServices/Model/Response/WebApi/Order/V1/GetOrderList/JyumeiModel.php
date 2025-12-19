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

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;
use Plugin\AceClient43\Entity\Constants\AceTaxType;

/**
 * Model for Jyumei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModel extends Rireki\RirekiModelLevel2 implements JyumeiModelInterface
{
    use Tax\TaxTrait;
    use Tax\TaxKbnTrait;

    public const NON_TAXABLE_GCODE = 'z01';

    /** @var ?string Name */
    protected ?string $name = null;

    /** @var float Tax Rate */
    protected float $taxRate = 0;

    /**
     * {@inheritDoc}
     */
    public function setTaxRate(float $taxRate): self
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxRate(): float
    {
        return $this->taxRate;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * 税額が0円かつ商品コードが不課税商品のコードの場合は非課税商品であると判断する
     *
     * @return bool
     */
    public function IsNonTaxable(): bool
    {
        return $this->getTaxRate() == 0 && $this->getGcode() === self::NON_TAXABLE_GCODE;
    }

    public function isTaxAdjusted(): bool
    {
        return $this->getTaxkbn() === AceTaxType::TAX_ADJUSTMENT;
    }
}
