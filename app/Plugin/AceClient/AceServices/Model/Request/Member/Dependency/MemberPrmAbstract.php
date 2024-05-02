<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestAbstract;

abstract class MemberPrmAbstract extends PrmModelRequestAbstract implements MemberPrmInterface
{
    const XML_NODE_NAME = 'member';

    /**
     * {@inheritDoc}
     */
    protected function setXmlRootNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}