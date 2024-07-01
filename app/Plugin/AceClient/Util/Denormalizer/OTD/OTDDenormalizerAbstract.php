<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

/**
 * Abstract class for Object To Data Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class OTDDenormalizerAbstract implements OTDDenormalizerInterface
{
    protected OTDDelegateInterface $delegate;

    public function __construct(
        OTDDelegateInterface $delegate
    ) {
        $this->delegate = $delegate;
    }

    /**
     * {@inheritDoc}
     */
    public function getDelegate(): OTDDelegateInterface
    {
        return $this->delegate;
    }
}