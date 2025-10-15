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

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V2\GetOrderListV2;

/**
 * Interface for Options Model
 */
interface OptionsModelInterface
{
    /**
     * Get return_jdfree_kubuns
     *
     * @return array|null
     */
    public function getReturnJdFreeKubuns(): ?array;

    /**
     * Set return_jdfree_kubuns
     *
     * @param array|null $returnJdFreeKubuns
     *
     * @return self
     */
    public function setReturnJdFreeKubuns(?array $returnJdFreeKubuns): self;

    /**
     * Get SearchName
     *
     * @return string|null
     */
    public function getSearchName(): ?string;

    /**
     * Set SearchName
     *
     * @param string|null $searchName
     *
     * @return self
     */
    public function setSearchName(?string $searchName): self;

    /**
     * Get all options as JSON string
     *
     * @return string|null
     */
    public function getOptionsJson(): ?string;

    /**
     * Set option by key
     *
     * @param string $key
     * @param mixed $value
     *
     * @return self
     */
    public function setOption(string $key, $value): self;

    /**
     * Get option by key
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getOption(string $key);

    /**
     * Get all options data
     *
     * @return array
     */
    public function getAllOptions(): array;
}
