<?php

namespace Plugin\AceClient43\Bridge;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait CreateRequestModelTrait
{
    protected ParameterBagInterface $parameterBag;

    protected ModelResolver $modelResolver;

    /**
     * @Required
     */
    public function setParameterBag(ParameterBagInterface $parameterBag): void
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @Required
     */
    public function setModelResolver(ModelResolver $modelResolver): void
    {
        $this->modelResolver = $modelResolver;
    }

    /**
     * リクエストモデルを作成する
     *
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    protected function createRequestModel(string $requestInterface): RequestModelInterface
    {
        // 1. 設定ファイルから検索
        $requestClass = $this->getRequestClassFromConfig($requestInterface);

        // 2. 設定にない場合は自動検出
        if (!$requestClass) {
            $requestClass = $this->modelResolver->findRequestModel($requestInterface);
        }

        // 3. 見つからない場合はエラー
        if (!$requestClass) {
            throw new InvalidClassNameException("Request class not found for interface: {$requestInterface}");
        }

        ClassFactory::validateCompatible($requestClass, $requestInterface);

        return new $requestClass();
    }

    /**
     * サブリクエストモデルを作成する
     *
     * @param string $class
     *
     * @return mixed
     *
     * @throws DataTypeMissMatchException
     * @throws InvalidClassNameException
     */
    protected function createSubModel(string $class)
    {
        $resolvedModel = $this->modelResolver->findRequestModel($class);

        if (!$resolvedModel) {
            throw new InvalidClassNameException("Sub request class not found for class: {$class}");
        }

        if ($resolvedModel !== $class && !is_subclass_of($resolvedModel, $class)) {
            throw new DataTypeMissMatchException("Class {$resolvedModel} is not a valid RequestModelInterface.");
        }

        return new $resolvedModel();
    }

    private function getRequestClassFromConfig(string $requestInterface): ?string
    {
        try {
            $mappings = $this->parameterBag->get('ace.request_response_mapping');

            return $mappings[$requestInterface]['request'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
