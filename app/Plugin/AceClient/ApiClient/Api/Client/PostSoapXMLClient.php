<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\Exception;
use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;

class PostSoapXMLClient extends PostClientAbstract
{
    /**
     * PostSoapXMLClient constructor
     *
     * @param string          $endpoint Target endpoint.
     * @param DelegateInterface $delegate Delegate instance.
     */
    public function __construct(
        protected string $endpoint,
        protected DelegateInterface $delegate
    ) {
    }

    /**
     * Build the request JSON body with the specified parameters
     *
     * @psalm-suppress MixedReturnTypeCoercion
     * @psalm-suppress InvalidReturnType
     * @psalm-suppress InvalidReturnStatement
     *
     * @throws Exception\RequestBuildException
     *
     * @return array<string, array<string, string[]>>
     */
    protected function buildOptions(): array
    {
        $baseOptions = parent::buildOptions();
        if (empty($this->request)) {
            return $baseOptions;
        }
        try {
            $request = $this->delegate->getSerializer()->serialize($this->request, EncodeDefineMapper::XML);
        } catch (\Throwable $t) {
            $this->delegate->getLogger()->error("API Client error: {$t->getMessage()}");
            throw new Exception\RequestBuildException("Cannot build {$this->requestmethod} request body", $t);
        }
        return array_merge_recursive(
            $baseOptions,
            [
                'headers' => ['Content-Type' => 'application/soap+xml; charset=utf-8'],
                'body'    => $request,
            ]
        );
    }
}