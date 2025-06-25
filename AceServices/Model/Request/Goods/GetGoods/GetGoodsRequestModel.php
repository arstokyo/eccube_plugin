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
    public function setOptions(?array $options)
    {
        $fmkbnCodes = $options['fmkbn'] ?? [];
        // フリーコードのフィルタリング
        if (isset($fmkbnCodes)) {
            $fmkbnCodes = array_filter(
                $fmkbnCodes,
                fn ($v) => !is_null($v) && $v !== ''
            );
            $options['fmkbn'] = array_values($fmkbnCodes);
        }
        $this->options = json_encode($options);

        return $this;
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
