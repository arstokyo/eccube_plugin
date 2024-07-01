<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class Add Cart Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AddCartRequestModel extends Request\RequestModelAbstract implements AddCartRequestModelInterface
{

    use NoCategory\IdTrait, 
        NoCategory\SessIdTrait;

    /** @var ?OrderPrmModel $prm Order Info */
    private ?OrderPrmModel $prm;

    const XML_NODE_NAME = 'addCart';

    /**
     * {@inheritDoc}
     */
    public function setPrm(OrderPrmModel $prm): self
    {
        $this->prm = $prm;
        return $this;
    }
   
    /**
     * {@inheritDoc}
     */
    public function getPrm(): OrderPrmModelInterface
    {
        return $this->prm;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (empty($this->sessId)) { throw new MissingRequestParameterException($this->compilePropertyName('sessId')); };
        if (empty($this->prm))  { throw new MissingRequestParameterException($this->compilePropertyName('prm')); };
        $this->prm->ensureParameterNotMissing();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}