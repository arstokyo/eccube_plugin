<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Symfony\Component\Serializer\Annotation\Ignore;
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
     * Set オーダー情報
     * 
     * @param Request\Jyuden\AddCart\OrderPrmModel $prm
     * @return Request\Jyuden\AddCart\AddCartRequestModel
     */
    public function setPrm(OrderPrmModel $prm): self
    {
        $this->prm = $prm;
        return $this;
    }
   
    /**
     * Get オーダー情報
     * 
     * @return string|null|object
     */
    public function getPrm(): string|null|object
    {
        return $this->prm->toData();
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