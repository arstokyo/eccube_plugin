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

namespace Plugin\AceClient43\Util\Serializer;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * デフォルトシリアライザ - フォールバック用
 */
class DefaultSerializer implements SerializerInterface, SerializerSupportInterface
{
    private const PRIORITY = 0; // Lowest priority - fallback

    private SerializerInterface $symfonySerializer;

    /**
     * Constructor
     *
     * @param SerializerInterface $symfonySerializer Symfony default serializer
     */
    public function __construct(SerializerInterface $symfonySerializer)
    {
        $this->symfonySerializer = $symfonySerializer;
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $apiType, string $format): bool
    {
        // Always return true as this is the fallback serializer
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority(): int
    {
        return self::PRIORITY;
    }

    /**
     * {@inheritDoc}
     */
    public function serialize($data, string $format, array $context = []): string
    {
        return $this->symfonySerializer->serialize($data, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function deserialize($data, string $type, string $format, array $context = []): mixed
    {
        return $this->symfonySerializer->deserialize($data, $type, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function supportsEncoding(string $format, array $context = []): bool
    {
        return $this->symfonySerializer->supportsEncoding($format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function supportsDecoding(string $format, array $context = []): bool
    {
        return $this->symfonySerializer->supportsDecoding($format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function encode($data, string $format, array $context = []): string
    {
        return $this->symfonySerializer->encode($data, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function decode(string $data, string $format, array $context = []): mixed
    {
        return $this->symfonySerializer->decode($data, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function normalize($object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return $this->symfonySerializer->normalize($object, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): mixed
    {
        return $this->symfonySerializer->denormalize($data, $type, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $this->symfonySerializer->supportsNormalization($data, $format, $context);
    }

    /**
     * {@inheritDoc}
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->symfonySerializer->supportsDenormalization($data, $type, $format, $context);
    }
}
