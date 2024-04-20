<?php

namespace Plugin\AceClient\Utils\Denormalize;

class OTDNoDenormalizer extends OTDDenormalizerAbstract
{
    public function denormalizeOTD(OTDDelegateInterface $delegate): mixed
    {
        return $delegate->getObject();
    }
}