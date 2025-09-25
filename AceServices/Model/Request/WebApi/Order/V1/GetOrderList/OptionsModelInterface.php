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

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Order\V1\GetOrderList;

use Symfony\Component\Serializer\Annotation\SerializedName;

interface OptionsModelInterface
{
    /**
     * Get ReturnJdFreeKubuns
     *
     * @return array|null
     */
    public function getReturnJdFreeKubuns(): ?array;

    /**
     * Set ReturnJdFreeKubuns
     *
     * @param array $returnJdFreeKubuns
     * @return self
     */
    public function setReturnJdFreeKubuns(?array $returnJdFreeKubuns): self;

    /**
     * Get all options as JSON string
     *
     * @return string|null
     * @SerializedName("options")
     */
    public function getOptionsJson(): ?string;

    /**
     * Set option by key
     *
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function setOption(string $key, $value): self;

    /**
     * Get option by key
     *
     * @param string $key
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
