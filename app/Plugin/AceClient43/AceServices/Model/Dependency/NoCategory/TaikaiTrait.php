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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

use Eccube\Entity\Master\CustomerStatus;

/**
 * Trait for 退会フラグ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaikaiTrait
{
    /**
     * 退会フラグ
     *
     * @var ?int
     */
    protected ?int $taikai = null;

    /**
     * {@inheritDoc}
     */
    public function getTaikai(): ?int
    {
        return $this->taikai;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaikai(?int $taikai)
    {
        $this->taikai = $taikai;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTaikaiAsCustomerStatus(): ?string
    {
        if ($this->getTaikai() === null) {
            return null;
        }

        return $this->getTaikai() === 0 ? CustomerStatus::REGULAR : CustomerStatus::PROVISIONAL;
    }
}
