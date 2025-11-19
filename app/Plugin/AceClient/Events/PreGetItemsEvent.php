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

use Plugin\AceClient43\AceServices\Model\Request\WebApi\Goods\V1\GoodsItems\V1GoodsItemsRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreGetItemsEvent extends Event
{
    /**
     * @var V1GoodsItemsRequestModelInterface
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

    /**
     * @var string|null
     */
    private $skid;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $tankaKubuns;

    /**
     * @param V1GoodsItemsRequestModelInterface $request
     * @param array $gdids
     * @param array $freeKubuns
     * @param string|null $skid
     * @param array $options
     * @param array $tankaKubuns
     */
    public function __construct(
        V1GoodsItemsRequestModelInterface $request,
        array $gdids,
        array $freeKubuns,
        ?string $skid,
        array $options,
        array $tankaKubuns,
    ) {
        $this->request = $request;
        $this->gdids = $gdids;
        $this->freeKubuns = $freeKubuns;
        $this->skid = $skid;
        $this->options = $options;
        $this->tankaKubuns = $tankaKubuns;
    }

    /**
     * @return V1GoodsItemsRequestModelInterface
     */
    public function getRequest(): V1GoodsItemsRequestModelInterface
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

    public function getTankaKubuns(): array
    {
        return $this->tankaKubuns;
    }
}
