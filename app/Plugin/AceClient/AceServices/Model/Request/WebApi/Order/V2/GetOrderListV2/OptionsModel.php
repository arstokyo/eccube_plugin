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
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    protected array $optionsData = [];

    /**
     * {@inheritDoc}
     */
    public function getReturnJdFreeKubuns(): ?array
    {
        return $this->optionsData['return_jdfree_kubuns'] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnJdFreeKubuns(?array $returnJdFreeKubuns): self
    {
        if ($returnJdFreeKubuns !== null) {
            $this->optionsData['return_jdfree_kubuns'] = $returnJdFreeKubuns;
        } else {
            unset($this->optionsData['return_jdfree_kubuns']);
        }

        return $this;
    }

    /**
     * Get all options as JSON string
     *
     * @return string|null
     */
    public function getOptionsJson(): ?string
    {
        if (empty($this->optionsData)) {
            return null;
        }

        $data = $this->optionsData;

        // Convert return_jdfree_kubuns array to comma-separated string
        if (isset($data['return_jdfree_kubuns']) && is_array($data['return_jdfree_kubuns'])) {
            $data['return_jdfree_kubuns'] = implode(',', $data['return_jdfree_kubuns']);
        }

        return json_encode($data);
    }

    /**
     * Set option by key
     *
     * @param string $key
     * @param mixed $value
     *
     * @return self
     */
    public function setOption(string $key, $value): self
    {
        $this->optionsData[$key] = $value;

        return $this;
    }

    /**
     * Get option by key
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getOption(string $key)
    {
        return $this->optionsData[$key] ?? null;
    }

    /**
     * Get all options data
     *
     * @return array
     */
    public function getAllOptions(): array
    {
        return $this->optionsData;
    }

    /**
     * Get SearchName
     *
     * @return string|null
     */
    public function getSearchName(): ?string
    {
        return $this->optionsData['search_name'] ?? null;
    }

    /**
     * Set SearchName
     *
     * @param string|null $searchName
     *
     * @return self
     */
    public function setSearchName(?string $searchName): self
    {
        if ($searchName !== null && trim($searchName) !== '') {
            $this->optionsData['search_name'] = trim($searchName);
        } else {
            unset($this->optionsData['search_name']);
        }

        return $this;
    }
}
