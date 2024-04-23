<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod\Jyuden\AddCartMethod;

/**
 * Jyuden Service
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $servicename = 'Jyuden';

    /**
     * Make AddCartMethod
     * 
     * @return AddCartMethod
     */
    public function makeCartMethod(): AddCartMethod
    {
        return new AddCartMethod($this->servicename);
    }
    
}