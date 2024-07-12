<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;

/**
 * Class GetIdRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetIdRequestModel extends RequestModelAbstract implements GetIdRequestModelInterface
{
    const XML_NODE_NAME = 'getId';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}