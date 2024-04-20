<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

interface XmlableInterface
{
    public function toXML(): string;
}