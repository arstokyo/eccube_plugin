<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\Exception;
use Plugin\AceClient\Util\Mapper\EncodeDefineMapper;

/**
 * PostSoapXmlClient
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PostSoapXmlClient extends PostClientAbstract
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

        $request = $this->serializeRequest(EncodeDefineMapper::XML);

        return array_merge_recursive($baseOptions,[
            'headers' => ['Content-Type' => 'application/soap+xml; charset=utf-8'],
            'body'    => $request,
        ]);
    }

}