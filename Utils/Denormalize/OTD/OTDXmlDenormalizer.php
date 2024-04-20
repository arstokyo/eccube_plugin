<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

use Plugin\AceClient\Utils\Serialize\ToXmlTrait;

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
     *  {@inheritDoc}
     * 
     */
    protected function setXmlSerializeOptions(): array
    {
        return $this->delegate->getDenomarlizeOptions() ?? [];
    }
    // Add your code here
}