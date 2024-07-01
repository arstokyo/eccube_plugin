<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\Exception;

class PostJsonClient extends PostClientAbstract implements ClientInterface
{
    /**
     * Build the request JSON body with the specified parameters
     *
     * @psalm-suppress MixedReturnTypeCoercion
     * @psalm-suppress InvalidReturnType
     * @psalm-suppress InvalidReturnStatement
     *
     * @throws Exception\CanNotBuildRequestException
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
            $request = $this->delegate->getSerializer()->serialize($this->request, 'json');
        } catch (\Throwable $t) {
            $this->delegate->getLogger()->error("API Client error: {$t->getMessage()}");
            throw new Exception\CanNotBuildRequestException("Cannot build {$this->requestmethod} request body", $t);
        }
        return array_merge_recursive(
            $baseOptions,
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body'    => $request,
            ]
        );
    }
}