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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;

/**
 * Trait for GMO Group 1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMOModelGroup1Trait
{
    /** @var ?string GMO会員ID */
    protected ?string $gmomemberid = null;

    /** @var ?string GMOオーダーID */
    protected ?string $gmoorderid = null;

    /** @var ?string GMO取引ID */
    protected ?string $gmotorihikiid = null;

    /** @var ?string GMO取引パスワード */
    protected ?string $gmotorihikipw = null;

    /**
     * {@inheritDoc}
     */
    public function getGmomemberid(): ?string
    {
        return $this->gmomemberid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmomemberid(?string $gmomemberid)
    {
        $this->gmomemberid = $gmomemberid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmoorderid(): ?string
    {
        return $this->gmoorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmoorderid(?string $gmoorderid)
    {
        $this->gmoorderid = $gmoorderid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmotorihikiid(): ?string
    {
        return $this->gmotorihikiid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmotorihikiid(?string $gmotorihikiid)
    {
        $this->gmotorihikiid = $gmotorihikiid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmotorihikipw(): ?string
    {
        return $this->gmotorihikipw;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmotorihikipw(?string $gmotorihikipw)
    {
        $this->gmotorihikipw = $gmotorihikipw;

        return $this;
    }
}
