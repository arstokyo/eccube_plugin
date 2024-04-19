<?php

namespace Plugin\AceClient\Utils\Normalize;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;


class NormalizerFactory
{
    /**
     * Make Anonotation Normalizers
     * 
     * @return NormalizerInterface[]
     */
    public static function makeAnnotationNormalizers() : array {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
        return [new ObjectNormalizer(
                    classMetadataFactory: $classMetadataFactory ,
                    nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter)
                ,)];
    }
}