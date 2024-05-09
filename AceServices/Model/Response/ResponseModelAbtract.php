<?php

namespace Plugin\AceClient\AceServices\Model\Response;

use Symfony\Component\Serializer\SerializerInterface;

class ResponseModelAbtract implements ResponseModelInterface
{
    /**
     * {@inheritDoc}
     */
    public function denomarlizeInnerData(SerializerInterface $serializer): self
    {
        return $this;
    }
}