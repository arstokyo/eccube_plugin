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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetDurationOrderTotalRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDurationOrderTotalRequestModel extends RequestModelAbstract implements GetDurationOrderTotalRequestModelInterface
{
    use NoCategory\SyidTrait;

    use NoCategory\MbidTrait;
    public const XML_NODE_NAME = 'getDurationOrderTotal';

    /** @var ?int 開始日付 */
    protected ?int $dayfrom = null;

    /** @var ?int 終了日付 */
    protected ?int $dayto = null;

    /**
     * {@inheritDoc}
     */
    public function getDayfrom(): ?int
    {
        return $this->dayfrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayfrom(?int $dayfrom)
    {
        $this->dayfrom = $dayfrom;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDayto(): ?int
    {
        return $this->dayto;
    }

    /**
     * {@inheritDoc}
     */
    public function setDayto(?int $dayto)
    {
        $this->dayto = $dayto;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
        if (!$this->mbid) {
            throw new MissingRequestParameterException($this->compilePropertyName('mbid'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
