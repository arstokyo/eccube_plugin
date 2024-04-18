<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use \Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;

trait XmlSerializerTrait
{
    public function asXML() : string {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $nomalizer = [new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory ,
            nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter),
        )];

        $serializer = new Serializer($nomalizer, $encoders);
        $context = $serializer->serialize([
                                            '@xmlns'=> 'http://ar-system-api.co.jp/',
                                            '#'=> $this
                                          ],'xml',
                                          [ 'xml_root_node_name'=> $this->xmlNodeName(), 
                                            'xml_format_output' => true,
                                            'xml_encoding' => 'utf-8',
                                            'encoder_ignored_node_types' =>  [
                                                \XML_PI_NODE, // removes XML declaration (the leading xml tag)
                                            ],]);
        return $context;
    }

    abstract protected function xmlNodeName();

}
