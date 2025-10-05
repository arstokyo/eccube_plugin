<?php

namespace Plugin\AceClient43\Util\Normalizer;

use Symfony\Component\PropertyInfo\Type as LegacyType;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\TypeInfo\Type;

class ModelTypeTraceableExtractor implements ModelTypeExtractorInterface
{
    private const TRACE_EVENT_NAME = 'model.type_extractor';

    private ModelTypeExtractor $inner;

    private ?Stopwatch $stopwatch;

    public function __construct(
        ModelTypeExtractor $inner,
        ?Stopwatch $stopwatch,
    ) {
        $this->inner = $inner;
        $this->stopwatch = $stopwatch;
    }

    /**
     * @param class-string $class
     * @param string $property
     * @param array $context
     *
     * @return LegacyType[]|null
     */
    public function getTypes(string $class, string $property, array $context = []): ?array
    {
        if ($this->stopwatch) {
            $this->stopwatch->start(self::TRACE_EVENT_NAME, 'serializer');
        }

        try {
            $types = $this->inner->getTypes($class, $property, $context);
        } finally {
            if ($this->stopwatch) {
                $this->stopwatch->stop(self::TRACE_EVENT_NAME);
            }
        }

        return $types;
    }

    public function getType(string $class, string $property, array $context = []): ?Type
    {
        if ($this->stopwatch) {
            $this->stopwatch->start(self::TRACE_EVENT_NAME, 'serializer');
        }

        try {
            $type = $this->inner->getType($class, $property, $context);
        } finally {
            if ($this->stopwatch) {
                $this->stopwatch->stop(self::TRACE_EVENT_NAME);
            }
        }

        return $type;
    }
}
