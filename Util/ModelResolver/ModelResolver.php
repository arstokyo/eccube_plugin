<?php

namespace Plugin\AceClient43\Util\ModelResolver;

use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Symfony\Component\Finder\Finder;

class ModelResolver
{
    private array $modelCache = [];

    private array $requestSearchPaths;

    private array $responseSearchPaths;

    public function __construct(array $requestSearchPaths = [], array $responseSearchPaths = [])
    {
        $this->requestSearchPaths = $requestSearchPaths ?: [
            'Plugin/'.OverviewMapper::PLUGIN_NAME.'/AceServices/Model/Request',
            'Customize/AceClient/Model/Request',
        ];

        $this->responseSearchPaths = $responseSearchPaths ?: [
            'Plugin/'.OverviewMapper::PLUGIN_NAME.'/AceServices/Model/Response',
            'Customize/AceClient/Model/Response',
        ];
    }

    public function findRequestModel(string $type): ?string
    {
        $cacheKey = 'request:'.$type;
        if (isset($this->modelCache[$cacheKey])) {
            return $this->modelCache[$cacheKey];
        }

        $modelClass = $this->findModelByNamespaceOptimized($type, $this->requestSearchPaths, 'RequestModel');
        $this->modelCache[$cacheKey] = $modelClass;

        return $modelClass;
    }

    public function findResponseModel(string $type): ?string
    {
        $cacheKey = 'response:'.$type;
        if (isset($this->modelCache[$cacheKey])) {
            return $this->modelCache[$cacheKey];
        }

        $modelClass = $this->findModelByNamespaceOptimized($type, $this->responseSearchPaths, 'ResponseModel');
        $this->modelCache[$cacheKey] = $modelClass;

        return $modelClass;
    }

    private function findModelByNamespaceOptimized(string $type, array $searchPaths, string $modelSuffix): ?string
    {
        $namespacePath = $this->extractNamespacePath($type);

        if ($namespacePath) {
            $modelClass = $this->findInSpecificNamespace($type, $searchPaths, $namespacePath, $modelSuffix);
            if ($modelClass) {
                return $modelClass;
            }
        }

        return $this->scanForImplementation($type, $searchPaths);
    }

    private function extractNamespacePath(string $interface): ?string
    {
        // Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface
        // から Jyuden\AddCart を抽出
        if (preg_match('/Plugin\\\\'.OverviewMapper::PLUGIN_NAME.'\\\\AceServices\\\\Model\\\\Request\\\\(.+)\\\\[^\\\\]+Interface$/', $interface, $matches)) {
            return str_replace('\\', '/', $matches[1]);
        }

        if (preg_match('/Plugin\\\\'.OverviewMapper::PLUGIN_NAME.'\\\\AceServices\\\\Model\\\\Response\\\\(.+)\\\\[^\\\\]+Interface$/', $interface, $matches)) {
            return str_replace('\\', '/', $matches[1]);
        }

        if (preg_match('/Customize\\\\AceClient\\\\Model\\\\Request\\\\(.+)\\\\[^\\\\]+Interface$/', $interface, $matches)) {
            return str_replace('\\', '/', $matches[1]);
        }

        if (preg_match('/Customize\\\\AceClient\\\\Model\\\\Response\\\\(.+)\\\\[^\\\\]+Interface$/', $interface, $matches)) {
            return str_replace('\\', '/', $matches[1]);
        }

        return null;
    }

    private function findInSpecificNamespace(string $type, array $searchPaths, string $namespacePath, string $modelSuffix): ?string
    {
        $isInterface = interface_exists($type);
        $typeName = basename(str_replace('\\', '/', $type));
        $modelName = $isInterface
            ? str_replace('Interface', '', $typeName)
            : $typeName;

        foreach ($searchPaths as $searchPath) {
            $specificPath = $searchPath.'/'.$namespacePath;
            $modelClass = $this->findModelInPath($modelName, $specificPath, $type, $isInterface);

            if ($modelClass) {
                return $modelClass;
            }
        }

        return null;
    }

    private function findModelInPath(string $modelName, string $searchPath, string $type, bool $isInterface): ?string
    {
        $basePath = dirname(__DIR__, 4).'/'.$searchPath;

        if (!is_dir($basePath)) {
            return null;
        }

        $modelFile = $basePath.'/'.$modelName.'.php';

        if (file_exists($modelFile)) {
            $className = $this->getClassNameFromFile($modelFile, $searchPath);

            if ($className && class_exists($className)) {
                if ($isInterface) {
                    if (is_a($className, $type, true)) {
                        return $className;
                    }
                } else {
                    if ($className === $type || is_subclass_of($className, $type)) {
                        return $className;
                    }
                }
            }
        }

        return null;
    }

    private function scanForImplementation(string $interface, array $searchPaths): ?string
    {
        foreach ($searchPaths as $searchPath) {
            $modelClass = $this->findInPath($interface, $searchPath);
            if ($modelClass) {
                return $modelClass;
            }
        }

        return null;
    }

    private function findInPath(string $interface, string $searchPath): ?string
    {
        $basePath = dirname(__DIR__, 4).'/'.$searchPath;

        if (!is_dir($basePath)) {
            return null;
        }

        $finder = new Finder();
        $finder->files()->name('*.php')->in($basePath);

        foreach ($finder as $file) {
            $className = $this->getClassNameFromFile($file->getPathname(), $searchPath);

            if ($className && class_exists($className) && is_a($className, $interface, true)) {
                return $className;
            }
        }

        return null;
    }

    private function getClassNameFromFile(string $filePath, string $searchPath): ?string
    {
        $appPath = dirname(__DIR__, 4);
        $fullSearchPath = $appPath.'/'.$searchPath.'/';

        // 絶対パスから検索パス部分を除去
        if (strpos($filePath, $fullSearchPath) !== 0) {
            return null;
        }

        $relativePath = substr($filePath, strlen($fullSearchPath));
        $relativePath = str_replace('.php', '', $relativePath);
        $relativePath = str_replace('/', '\\', $relativePath);

        // 名前空間を構築
        $namespace = str_replace('/', '\\', $searchPath);

        return $namespace.'\\'.$relativePath;
    }
}
