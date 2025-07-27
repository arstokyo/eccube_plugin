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

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

use Plugin\AceClient43\Exception\NotSerializableException;
use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * Denormalizer for Object To Data.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDXmlDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        if (null === $this->delegate->getSerializer()) {
            throw new \RuntimeException('OTDXmlDenormalizer Error: Serializer is not set in delegate.');
        }

        $options = $this->getDelegate()->getDenomarlizeOptions() ?? [];
        $options = array_merge([AbstractObjectNormalizer::SKIP_NULL_VALUES => true], $options);

        try {
            $context = $this->delegate->getSerializer()->serialize($this->getDelegate()->getObject(),
                EncodeDefineMapper::XML,
                $options);
        } catch (\Throwable $e) {
            throw new NotSerializableException(sprintf('Could not serialize class "%s" to XML', self::class), $e);
        }

        return $context;
    }
}
