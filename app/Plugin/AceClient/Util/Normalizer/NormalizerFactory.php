<?php

namespace Plugin\AceClient\Util\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorResolverInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Plugin\AceClient\Exception\InvalidClassNameException;
use Plugin\AceClient\Exception\InvalidFuncNameException;
use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Plugin\AceClient\Util\ClassFactory\ClassFactory;
use Plugin\AceClient\Util\Denormalizer\DenormalizerFactory;

/**
 * Factory for Normalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class NormalizerFactory
{
    const DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER = 'DefaultSoapNormalizers';

    const DEFAULT_NORMALIZER = \Plugin\AceClient\Util\Normalizer\SoapXmlNormalizer::class;

    /**
     * Make Anonotation Normalizers
     * 
     * @return NormalizerInterface[]
     */
    public static function makeAnnotationNormalizers() : array 
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();
        return self::makeNormalizers($classMetadataFactory,nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter));
    }

    /**
     * Make Recursive Normalizers
     * 
     * @return NormalizerInterface[]
     */
    public static function makeDTONormalizers() : array 
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();
        return \array_merge(self::makeNormalizers($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory), null,new ReflectionExtractor));
    }

    public static function makeDefaultSoapNormalizers() : array 
    {
        $classMetadataFactory = self::makeAnnotationMetaFactory();
        return \array_merge([new AceDateTimeNormalizer(), new PrmNormalizer(), DenormalizerFactory::makeArrayDenormalizer(), DenormalizerFactory::makeAsListDenormalizer()],
                             self::makeNormalizers($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory), null, new SoapReflectionExtractor()));
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
    private static function makeNormalizers(ClassMetadataFactoryInterface $classMetadataFactory = null, NameConverterInterface $nameConverter = null, PropertyAccessorInterface $propertyAccessor = null, PropertyTypeExtractorInterface $propertyTypeExtractor = null, ClassDiscriminatorResolverInterface $classDiscriminatorResolver = null, callable $objectClassResolver = null, array $defaultContext = []): array
    {
        return [new ObjectNormalizer(
                    classMetadataFactory: $classMetadataFactory,
                    nameConverter: $nameConverter,
                    propertyAccessor: $propertyAccessor,
                    propertyTypeExtractor: $propertyTypeExtractor,
                    classDiscriminatorResolver: $classDiscriminatorResolver,
                    objectClassResolver: $objectClassResolver,
                    defaultContext: $defaultContext
                ,)];
    }

    /**
     * Make Annotation Meta Facetory
     * 
     * @return ClassMetadataFactoryInterface
     */
    private static function makeAnnotationMetaFactory(): ClassMetadataFactoryInterface 
    {
        return new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
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
        return ClassFactory::makeClass($className ,NormalizerInterface::class);
    }

    /**
     * Make Normalizer by function name suffix
     * 
     * @param string $funcSuffixName
     * @example make{$funcSuffixName} $funcSuffixName = "AnnotationNormalizers" => makeAnnotationNormalizers
     * 
     * @return NormalizerInterface|NormalizerInterface[]
     * 
     * @throws InvalidFuncNameException
     */
    public static function makeNormalizerByFuncNameSuffix($funcSuffixName): NormalizerInterface|array
    {
        $callMethod = 'make'.$funcSuffixName;
        if (!method_exists(self::class, $callMethod)) {
            throw new InvalidFuncNameException(sprintf('Given function name does not exist. Given function suffix name %s', $funcSuffixName));
        }
        return self::{$callMethod}();
    }

}