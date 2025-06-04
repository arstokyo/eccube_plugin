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

namespace Plugin\AceClient43\Util\Normalizer;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\NotSerializableException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Normalizer for Prm
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    private array $cacheObj = [];

    /**
     * @param PrmModelInterface $object
     *
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function normalize($object, ?string $format = null, array $context = [])
    {
        if (!$object instanceof PrmModelInterface) {
            throw new DataTypeMissMatchException('Prm normalize Error: Expected PrmModelInterface object');
        }

        $object->parseSerializer($this->serializer);
        $this->cacheObj[] = $object::class;

        try {
            $result = $object->toData();
        } catch (\Throwable $e) {
            $this->unsetCacheObj($object::class);
            throw new NotSerializableException(sprintf('Could not normalize object "%s". %s', $object::class, $e->getMessage()), $e);
        }

        $this->unsetCacheObj($object::class);

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, ?string $format = null)
    {
        return ($data instanceof PrmModelInterface) && (!in_array(get_class($data), $this->cacheObj));
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    /**
     * Unset the cache path
     *
     * @param string $path
     */
    private function unsetCacheObj(string $class)
    {
        if (($key = array_search($class, $this->cacheObj)) !== false) {
            unset($this->cacheObj[$key]);
        }
    }

    public function getSupportedTypes(?string $format)
    {
        return [
            PrmModelInterface::class => false,
        ];
    }
}
