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

class GetClient extends AbstractClient implements GetClientInterface
{
    protected string $requestmethod = 'GET';

    /**
     * Build the request url with the specified parameters
     *
     * @return string
     *
     * @throws Exception\CanNotBuildRequestException
     */
    protected function buildUri(): string
    {
        $baseUri = parent::buildUri();
        if (empty($this->request)) {
            return $baseUri;
        }

        try {
            $data = (array) $this->delegate->getNormalizer()->normalize($this->request);
            $query = str_contains($baseUri, '?') ? '&' : '?';
            /* @psalm-suppress MixedArgumentTypeCoercion */
            $query .= array_is_list($data)
                      ? implode('&', $data)
                      : http_build_query($data);
        } catch (\Throwable $t) {
            $this->delegate->getLogger()->error("API Client error: {$t->getMessage()}");
            throw new Exception\CanNotBuildRequestException('Cannot build GET query string', $t);
        }

        return sprintf('%s%s', $baseUri, $query);
    }
}
