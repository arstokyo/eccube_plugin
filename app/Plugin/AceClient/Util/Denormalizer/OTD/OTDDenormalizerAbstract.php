<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

/**
 * Abstract class for Object To Data Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class OTDDenormalizerAbstract implements OTDDenormalizerInterface
{

    public function __construct(
        protected OTDDelegateInterface $delegate
    ){
    }

    /**
     * {@inheritDoc}
     */
    public function getDelegate(): OTDDelegateInterface
    {
        return $this->delegate;
    }
}