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

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;
use Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

/**
 * Model for Jyumei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModel extends Rireki\RirekiModelLevel2 implements JyumeiModelInterface
{
    use Tax\TaxTrait;
    use Tax\TaxKbnTrait;

    /** @var ?string キャンセル日 */
    protected ?AceDateTime\AceDateTimeInterface $cday = null;

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
     * {@inheritDoc}
     */
    public function getCday()
    {
        return $this->cday;
    }

    /**
     * {@inheritDoc}
     */
    public function setCday($cday): self
    {
        $this->cday = AceDateTime\AceDateTimeFactory::makeAceDateTime($cday);

        return $this;
    }
}
