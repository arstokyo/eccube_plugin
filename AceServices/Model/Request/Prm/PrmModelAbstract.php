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

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * Abstract class for Prm Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class PrmModelAbstract implements PrmModelInterface
{
    public const XML_FORMAT_NAME = EncodeDefineMapper::XML;
    public const JSON_FORMAT_NAME = EncodeDefineMapper::JSON;

    public function getSerializeFormat(): string
    {
        return self::XML_FORMAT_NAME; // default to XML
    }

    public function getSerializeOptions(): array
    {
        $options = [];
        $nodeName = $this->fetchPrmNodeName();

        if (!empty($nodeName)) {
            $options[EncodeDefineMapper::XML_ROOT_NODE_NAME] = $nodeName;
        }

        $options[AbstractObjectNormalizer::SKIP_NULL_VALUES] = true;

        return $options;
    }

    /**
     * Fetch Prm Node Name when decode to XML
     *
     * @return string
     */
    abstract protected function fetchPrmNodeName(): string;

    /**
     * Compile the Property Name with the class name.
     *
     * @param string $propertyName
     *
     * @return string
     */
    protected function compilePropertyName(string $propertyName): string
    {
        return get_class($this).'.'.$propertyName;
    }
}
