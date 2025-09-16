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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Trait for Result
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ResultTrait
{
    /**
     * Result
     *
     * @var ?string
     */
    protected ?string $result = null;

    /**
     * {@inheritDoc}
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * {@inheritDoc}
     */
    public function setResult(?string $result)
    {
        $this->result = $result;

        return $this;
    }
}
