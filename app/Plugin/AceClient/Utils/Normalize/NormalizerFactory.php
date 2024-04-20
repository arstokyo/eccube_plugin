<?php

namespace Plugin\AceClient\Utils\Normalize;

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


final class NormalizerFactory
{
    /**
     * Make Anonotation Normalizers
     * 
     * @return NormalizerInterface[]
     */
    final public static function makeAnnotationNormalizers() : array {
        $classMetadataFactory = self::makeAnnotationMetaFacetory();
        return self::makeNormalizers($classMetadataFactory,nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter));
    }

    /**
     * Make Recursive Normalizers
     * 
     * @return NormalizerInterface[]
     */
    final public static function makeRecursiveNormalizers() : array {
        $classMetadataFactory = self::makeAnnotationMetaFacetory();
        return self::makeNormalizers($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter), null,new ReflectionExtractor);
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
    private static function makeAnnotationMetaFacetory(): ClassMetadataFactoryInterface {
        return new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
    }

}