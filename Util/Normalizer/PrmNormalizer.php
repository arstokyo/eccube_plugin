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
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Ace Prm Normalizer with injected config and serializer resolver
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    private array $prmConfig;

    private array $cacheObj = [];

    /**
     * Constructor
     *
     * @param array $prmConfig
     */
    public function __construct(
        array $prmConfig,
    ) {
        $this->prmConfig = $prmConfig;
    }

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

        $this->cacheObj[] = $object::class;

        try {
            // Resolve serializer using injected resolver
            $apiType = '*'; // Use wildcard for all API types
            $serializeFormat = $object->getSerializeFormat();

            // Get serialization options from model and configuration
            $modelOptions = $object->getSerializeOptions();
            $configOptions = $this->getConfigOptionsForModel($object);

            // Merge options: model options take precedence over config
            // Ignore the parsed context options
            $options = array_merge($configOptions, $modelOptions);

            // Direct serialization without passing serializer to the model
            $result = $this->serializer->serialize($object, $serializeFormat, $options);
        } catch (\Throwable $e) {
            throw new NotSerializableException(sprintf('Could not normalize object "%s". %s', $object::class, $e->getMessage()), $e);
        } finally {
            $this->unsetCacheObj($object::class);
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, ?string $format = null): bool
    {
        return ($data instanceof PrmModelInterface) && (!in_array(get_class($data), $this->cacheObj));
    }

    /**
     * Get configuration options for a specific model
     *
     * @param PrmModelInterface $model
     *
     * @return array
     */
    private function getConfigOptionsForModel(PrmModelInterface $model): array
    {
        $className = get_class($model);

        // Check for model-specific overrides
        if (isset($this->prmConfig['overrides'][$className])) {
            $override = $this->prmConfig['overrides'][$className];

            return $override['options'] ?? [];
        }

        // Return default options
        $defaultOptions = $this->prmConfig['default_options'] ?? [];

        // Add standard serialization options
        if (!isset($defaultOptions[AbstractObjectNormalizer::SKIP_NULL_VALUES])) {
            $defaultOptions[AbstractObjectNormalizer::SKIP_NULL_VALUES] = true;
        }

        return $defaultOptions;
    }

    /**
     * Unset the cache path
     *
     * @param string $class
     */
    private function unsetCacheObj(string $class)
    {
        if (($key = array_search($class, $this->cacheObj)) !== false) {
            unset($this->cacheObj[$key]);
        }
    }

    /**
     * Keep for backward compatibility
     *
     * @param string|null $format
     *
     * @return false[]
     */
    public function getSupportedTypes(?string $format)
    {
        return [
            PrmModelInterface::class => false,
        ];
    }
}
