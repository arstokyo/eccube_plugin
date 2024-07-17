<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetPointRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class CheckMailAdressRequestModel extends RequestModelAbstract implements CheckMailAdressRequestModelInterface
{
    const XML_NODE_NAME = 'checkMailAdress';

    use NoCategory\IdTrait, Mail\MailAdressTrait;
    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (!$this->mailadress) { throw new MissingRequestParameterException($this->compilePropertyName('mailadress')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}