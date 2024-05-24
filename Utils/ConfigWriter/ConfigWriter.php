<?php

namespace Plugin\AceClient\Utils\ConfigWriter;

use Plugin\AceClient\Utils\ContainerBuilder\ContainerBuilderFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Yaml;
use Plugin\AceClient\Utils\Mapper\FilePathMapper;

class ConfigWriter
{

    /** @var ContainerBuilder $container */
    private ContainerInterface $container;

    public function __construct()
    {
        $this->container = $this->createNewContainer();
        $this->container ->setParameter('test', 'testParamerter');
    }

    public function updateBaseUri(string $newUri)
    {
        $filePath = FilePathMapper::ROOT_CONFIG_PATH .\DIRECTORY_SEPARATOR. FilePathMapper::ACE_CLIENT_FILE_NAME;
        $config = Yaml::parseFile($filePath);
        $baseUriPath = $this->getBaseUriPath();
        $keys = explode('.', $baseUriPath);

        $temp = &$config;
        foreach ($keys as $key) {
            $temp = &$temp[$key];
        }
        $temp = $newUri;
        
        $existingConfig = Yaml::parseFile($filePath);
        $mergedConfig = array_replace_recursive($existingConfig, $config);
    
        $yaml = Yaml::dump($mergedConfig, 10, 4);
    
        file_put_contents($filePath, $yaml);
    }

    /**
     * Create a new container.
     * 
     * @return ContainerBuilder
     */
    public function createNewContainer(): ContainerInterface 
    {
        return ContainerBuilderFactory::makeAceExtensionContainer();
    }

    public function testComplie()
    {
        $this->container->compile();
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getBaseUriPath(): string
    {
        return 'parameters.ace_method.default.http_client.base_uri';
    }

}