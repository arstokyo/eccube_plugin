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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class GetGoodsRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetGoodsRequestModel extends RequestModelAbstract implements GetGoodsRequestModelInterface
{
    use NoCategory\IdTrait;

    use Day\ExecDateFromTrait;

    use Day\ExecDateToTrait;
    public const XML_NODE_NAME = 'getGoods';

    /**
     * @var ?string
     */
    #[SerializedName('Options')]
    private $options;

    /**
     * {@inheritDoc}
     */
    public function getOptions(): ?string
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions(?string $options)
    {
        // 文字列が有効なJSONかどうかの検証
        if ($options !== null && !$this->isValidJson($options)) {
            throw new \InvalidArgumentException('Options must be a valid JSON string');
        }

        $this->options = $options;

        return $this;
    }

    /**
     * Check if string is valid JSON
     *
     * @param string $jsonString
     *
     * @return bool
     */
    private function isValidJson(string $jsonString): bool
    {
        json_decode($jsonString);

        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
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
