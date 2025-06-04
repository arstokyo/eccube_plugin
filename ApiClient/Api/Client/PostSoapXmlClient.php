<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\ApiClient\Api\Client;

use Plugin\AceClient43\Exception;
use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;

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
     * @return array<string, array<string, string[]>>
     *
     * @throws Exception\CanNotBuildRequestException
     */
    protected function buildOptions(): array
    {
        $baseOptions = parent::buildOptions();
        if (empty($this->request)) {
            return $baseOptions;
        }

        $request = $this->serializeRequest(EncodeDefineMapper::XML);

        return array_merge_recursive($baseOptions, [
            'headers' => ['Content-Type' => 'application/soap+xml; charset=utf-8'],
            'body' => $request,
        ]);
    }
}
