<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdatePassword;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class UpdatePasswordRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class UpdatePasswordRequestModel extends RequestModelAbstract implements UpdatePasswordRequestModelInterface
{
    use NoCategory\PassWdTrait,
        NoCategory\SyidTrait,
        NoCategory\MbidTrait;

    const XML_NODE_NAME = 'updatePassword';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
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