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

namespace Plugin\AceClient43\AceConfig\Model\AceMethod;

use Plugin\AceClient43\AceConfig\Model\ConfigModelInterface;
use Plugin\AceClient43\Util\ConfigLoader\ConvertToConstTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * HttpClientConfigModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class HttpClientConfigModel extends InstanceConfigAbstract implements ConfigModelInterface
{
    use ConvertToConstTrait;
    /**
     * @var ?string Base URI
     */
    /** @SerializedName("base_uri") */
    private ?string $baseUri = null;

    /**
     * @var ?array Header
     */
    private ?array $headers = null;

    /**
     * @var ?array Options
     */
    private ?array $options = null;

    /**
     * Get the base URI.
     *
     * @return ?string
     */
    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    /**
     * Set the base URI.
     *
     * @param ?string $baseUri
     *
     * @return void
     */
    public function setBaseUri(?string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * Get the headers.
     *
     * @return ?array
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * Set the headers.
     *
     * @param ?array $headers
     *
     * @return void
     */
    public function setHeaders(?array $headers): void
    {
        if (\array_key_exists('User-Agent', $headers) && \defined($headers['User-Agent'])) {
            $headers['User-Agent'] = $this->convertVarToStringConst($headers['User-Agent']);
        }
        $this->headers = $headers;
    }

    /**
     * Get the options.
     *
     * @return ?array
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * Set the options.
     *
     * @param ?array $options
     *
     * @return void
     */
    public function setOptions(?array $options): void
    {
        $this->options = $options;
    }
}
