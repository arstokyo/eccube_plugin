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

namespace Plugin\AceClient43\AceServices\AceMethod;

use Plugin\AceClient43\AceServices\Model\Request;
use Plugin\AceClient43\ApiClient\Client\ClientMetadataInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Interface for Ace Method
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AceMethodInterface
{
    /**
     * Set the Request.
     *
     * @param Request\RequestModelInterface $requestModel
     *
     * @return self
     *
     * @throws MissingRequestParameterException
     */
    public function withRequest(Request\RequestModelInterface $requestModel): self;

    /**
     * Send the Request.
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;

    /**
     * Get the Metadata.
     *
     * @return ClientMetadataInterface
     */
    public function getMetadata(): ClientMetadataInterface;
}
