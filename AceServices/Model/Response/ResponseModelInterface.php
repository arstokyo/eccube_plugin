<?php

namespace Plugin\AceClient\AceServices\Model\Response;

use Symfony\Component\Serializer\SerializerInterface;

interface ResponseModelInterface 
{
    /**
     * Denormalize inner data.
     * 
     * @param SerializerInterface $serializer
     * 
     * @return self
     */
    public function denomarlizeInnerData(SerializerInterface $serializer): self;
}