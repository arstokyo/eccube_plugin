<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Plugin\AceClient\Exception\SerializeException;

trait AsXmlTrait
{
    public function asXML() : string {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
        $serializer = new Serializer( 
                      normalizers: [new ObjectNormalizer(
                                    classMetadataFactory: $classMetadataFactory ,
                                    nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter),
                                    )],
                      encoders: [new XmlEncoder()] );
        try {
            $context = $serializer->serialize($this,'xml',$this->setXmlSerializeOptions());
        } catch(\Throwable $e) {
            throw new SerializeException(sprintf('Could not serialize class "%s" to XML', self::class));
        };
        return $context;
    }

    abstract protected function setXmlSerializeOptions(): array;

}
