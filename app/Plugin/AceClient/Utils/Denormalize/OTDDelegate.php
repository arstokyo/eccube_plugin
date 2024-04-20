<?php

namespace Plugin\AceClient\Utils\Denormalize;

class OTDDelegate implements OTDDelegateInterface
{
    /**
     * @var mixed $object
     */
    private $object;

    /**
     * @var array $denormalizeOptions
     */
    private $denormalizeOptions;

    /**
     * Constructor.
     * 
     * @param mixed $object
     * @param array $denormalizeOptions
     */
    public function __construct($object, array $denormalizeOptions = [])
    {
        $this->object = $object;
        $this->denormalizeOptions = $denormalizeOptions;
    }

    /**
     * Get the value of object
     * 
     * @return mixed
     */
    public function getObject(): mixed
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