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

use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItemsTanka\V1GoodsItemsTankaRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreGetItemsTankaEvent extends Event
{
    /**
     * @var V1GoodsItemsTankaRequestModelInterface
     */
    private $request;

    /**
     * @var array
     */
    private $gdids;

    /**
     * @var array
     */
    private $freeKubuns;

    private $tankaKubuns;

    private $extraFields;

    /**
     * @var string|null
     */
    private $skid;

    /**
     * @var array
     */
    private $options;

    /**
     * @param V1GoodsItemsTankaRequestModelInterface $request
     * @param array $gdids
     * @param array $freeKubuns
     * @param array $tankaKubuns
     * @param array $extraFields
     * @param string|null $skid
     * @param array $options
     */
    public function __construct(
        V1GoodsItemsTankaRequestModelInterface $request,
        array $gdids,
        array $freeKubuns,
        array $tankaKubuns,
        array $extraFields,
        ?string $skid,
        array $options,
    ) {
        $this->request = $request;
        $this->gdids = $gdids;
        $this->freeKubuns = $freeKubuns;
        $this->skid = $skid;
        $this->options = $options;
        $this->tankaKubuns = $tankaKubuns;
        $this->extraFields = $extraFields;
    }

    /**
     * @return V1GoodsItemsTankaRequestModelInterface
     */
    public function getRequest(): V1GoodsItemsTankaRequestModelInterface
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getGdids(): array
    {
        return $this->gdids;
    }

    /**
     * @return array
     */
    public function getFreeKubuns(): array
    {
        return $this->freeKubuns;
    }

    public function getTankaKubuns(): array
    {
        return $this->tankaKubuns;
    }

    public function getExtraFields(): array
    {
        return $this->extraFields;
    }

    /**
     * @return string|null
     */
    public function getSkid(): ?string
    {
        return $this->skid;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
