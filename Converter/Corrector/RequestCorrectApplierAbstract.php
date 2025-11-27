<?php

namespace Plugin\AceClient43\Converter\Corrector;

abstract class RequestCorrectApplierAbstract
{
    protected iterable $correctors;

    public function __construct(
        iterable $correctors,
    ) {
        $this->correctors = $correctors;
    }

    public function hasCorrectors(): bool
    {
        return \iterator_count($this->correctors) > 0;
    }
}
