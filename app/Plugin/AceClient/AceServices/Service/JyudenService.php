<?php

namespace Plugin\AceClient\AceServices\Service;

use Plugin\AceClient\AceServices\AceServiceInterface;
use Plugin\AceClient\AceServices\AceServiceAbstract;
use Plugin\AceClient\AceServices\AceMethod\Jyuden\AddCartMethod;
use Plugin\AceClient\AceServices\AceMethod;

/**
 * Jyuden Service
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Jyuden';

    /**
     * Make AddCartMethod
     * 
     * @return AceMethod\Jyuden\AddCartMethod
     */
    public function makeAddCartMethod(): AddCartMethod
    {
        return new AddCartMethod($this->baseServiceName);
    }
    
}