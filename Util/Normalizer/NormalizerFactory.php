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

use Doctrine\Common\Annotations\AnnotationReader;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Exception\InvalidFuncNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Plugin\AceClient43\Util\Denormalizer\DenormalizerFactory;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorResolverInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Factory for Normalizer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class NormalizerFactory
{
    public const DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER = 'DefaultSoapNormalizers';

    public const DEFAULT_NORMALIZER = SoapXmlNormalizer::class;

    /**
     * Make Anonotation Normalizers
     *
     * @return NormalizerInterface[]
     */
    public static function makeAnnotationNormalizers(): array
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();

        return self::makeNormalizers($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter()));
    }

    /**
     * Make Recursive Normalizers
     *
     * @return NormalizerInterface[]
     */
    public static function makeDTONormalizers(): array
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();

        return \array_merge(self::makeNormalizers($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory), null, new ReflectionExtractor()));
    }

    /**
     * Make Default Soap Normalizers
     *
     * @comment 2024/07/05 - SoapReflectionExtractorを使わないため、ReflectionExtractorを使うように変更
     *
     * @return NormalizerInterface[]
     */
    public static function makeDefaultSoapNormalizers(ModelResolver $modelResolver): array
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();

        return \array_merge(
            [new AceDateTimeNormalizer(), new PrmNormalizer(), DenormalizerFactory::makeArrayDenormalizer(), DenormalizerFactory::makeAsListDenormalizer($modelResolver)],
            self::makeNormalizers(
                $classMetadataFactory,
                new MetadataAwareNameConverter($classMetadataFactory),
                null,
                new ModelTypeExtractor($modelResolver)
            )
        );
    }

    /**
     * Make Normalizers
     *
     * @param ClassMetadataFactoryInterface|null $classMetadataFactory
     * @param NameConverterInterface|null $nameConverter
     * @param PropertyAccessorInterface|null $propertyAccessor
     * @param PropertyTypeExtractorInterface|null $propertyTypeExtractor
     * @param ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver
     * @param callable|null $objectClassResolver
     * @param array $defaultContext
     *
     * @return NormalizerInterface[]
     */
    private static function makeNormalizers(?ClassMetadataFactoryInterface $classMetadataFactory = null, ?NameConverterInterface $nameConverter = null, ?PropertyAccessorInterface $propertyAccessor = null, ?PropertyTypeExtractorInterface $propertyTypeExtractor = null, ?ClassDiscriminatorResolverInterface $classDiscriminatorResolver = null, ?callable $objectClassResolver = null, array $defaultContext = []): array
    {
        return [new ObjectNormalizer(
            $classMetadataFactory,
            $nameConverter,
            $propertyAccessor,
            $propertyTypeExtractor,
            $classDiscriminatorResolver,
            $objectClassResolver,
            $defaultContext, )];
    }

    /**
     * Make Annotation Meta Facetory
     *
     * @return ClassMetadataFactoryInterface
     */
    private static function makeAnnotationMetaFactory(): ClassMetadataFactoryInterface
    {
        return new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
    }

    /**
     * Make Normalizer by class name
     *
     * @param string $className
     *
     * @return NormalizerInterface
     *
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    public static function makeNormalizerByClassName($className): NormalizerInterface
    {
        return ClassFactory::makeClass($className, NormalizerInterface::class);
    }

    /**
     * Make Normalizer by function name suffix
     *
     * @param string $funcSuffixName
     *
     * @example make{$funcSuffixName} $funcSuffixName = "AnnotationNormalizers" => makeAnnotationNormalizers
     *
     * @return NormalizerInterface|NormalizerInterface[]
     *
     * @throws InvalidFuncNameException
     */
    public static function makeNormalizerByFuncNameSuffix($funcSuffixName, ...$args)
    {
        $callMethod = 'make'.$funcSuffixName;
        if (!method_exists(self::class, $callMethod)) {
            throw new InvalidFuncNameException(sprintf('Given function name does not exist. Given function suffix name %s', $funcSuffixName));
        }

        return self::{$callMethod}(...$args);
    }
}
