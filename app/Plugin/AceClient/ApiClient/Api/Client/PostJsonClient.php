<?php

namespace Plugin\AceClient43\ApiClient\Api\Client;

use Plugin\AceClient43\Exception;
use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;

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

        $request = $this->serializeRequest(EncodeDefineMapper::JSON);

        return array_merge_recursive($baseOptions, [
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => $request,
        ]);
    }
}