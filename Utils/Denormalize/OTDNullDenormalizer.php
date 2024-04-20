<?php

namespace Plugin\AceClient\Utils\Denormalize;

class OTDNullDenormalizer extends OTDDenormalizerAbstract
{
    public function denormalizeOTD(OTDDelegateInterface $delegate): mixed
    {
        return null;
    }
}