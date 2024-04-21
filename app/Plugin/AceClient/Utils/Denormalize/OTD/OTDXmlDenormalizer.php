<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

use Plugin\AceClient\Utils\Serialize\ToXmlTrait;

/**
 * Denormalizer for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDXmlDenormalizer extends OTDDenormalizerAbstract
{
    use ToXmlTrait;

    /**
     * @var OTDDelegateInterface
     */
    private OTDDelegateInterface $delegate;

    /**
     * Denormalize OTD
     * 
     * @param OTDDelegateInterface $delegate
     * @return string|null|object
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): string|null|object
    {
        $this->delegate = $delegate;    
        return $this->toXML($delegate->getObject());
    }

    /**
     * Set options for XML serialization.
     * 
     * @return ?array
     */
    protected function setXmlSerializeOptions(): ?array
    {
        return $this->delegate->getDenomarlizeOptions() ?? [];
    }

}