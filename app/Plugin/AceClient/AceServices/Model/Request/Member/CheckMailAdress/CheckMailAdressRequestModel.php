<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\Exception\MissingRequestParameterException;

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