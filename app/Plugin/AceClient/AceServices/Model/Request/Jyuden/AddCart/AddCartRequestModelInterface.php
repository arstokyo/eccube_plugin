<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request;

interface AddCartRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
     /**
     * Set オーダー情報
     * 
     * @param Request\Jyuden\AddCart\OrderPrmModel $prm
     * @return Request\Jyuden\AddCart\AddCartRequestModel
     */
    public function setPrm(OrderPrmModel $prm): self;
   
    /**
     * Get オーダー情報
     * 
     * @return Request\Jyuden\AddCart\OrderPrmModel
     */
    public function getPrm(): OrderPrmModelInterface;
}
