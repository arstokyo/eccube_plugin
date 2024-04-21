<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Delegate for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class OTDDelegate implements OTDDelegateInterface
{
    /**
     * @var mixed $object
     */
    private object $object;

    /**
     * @var array $denormalizeOptions
     */
    private array $denormalizeOptions;

    /**
     * Constructor.
     * 
     * @param object $object
     * @param array $denormalizeOptions
     */
    public function __construct(object $object, array $denormalizeOptions = [])
    {
        $this->object = $object;
        $this->denormalizeOptions = $denormalizeOptions;
    }

    /**
     * Get the value of object
     * 
     * @return mixed
     */
    public function getObject(): object
    {
        return $this->object;
    }

    /**
     * Get the value of denormalizeOptions
     * 
     * @return array
     */
    public function getDenomarlizeOptions(): array
    {
        return $this->denormalizeOptions;
    }
}