<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\User;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class Get member Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
class GetMemberRequestModel extends RequestModelAbstract implements GetMemberRequestModelInterface
{

    use NoCategory\IdTrait,
        User\UserIdTrait,
        NoCategory\PassWdTrait;

    const XML_NODE_NAME = 'getMember';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->userid) { throw new MissingRequestParameterException($this->compilePropertyName('userid')); };
        if (!$this->passwd) { throw new MissingRequestParameterException($this->compilePropertyName('passwd')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}