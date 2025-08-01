<?php

namespace Plugin\AceClient43\Util\Logger;

use Monolog\Formatter\LineFormatter as BaseLineFormatter;

/**
 * Custom LineFormatter that truncates messages and context/extra items to a fixed length.
 */
class LineFormatter extends BaseLineFormatter
{
    /**
     * Maximum length for message and context/extra strings.
     *
     * @var int
     */
    private int $maxLineLength;

    /**
     * @param int         $maxLineLength                  Maximum length for message/context/extra.
     * @param string|null $format                         The format of the message (uses SIMPLE_FORMAT if null).
     * @param string|null $dateFormat                     The format of the timestamp (DateTime::format compatible).
     * @param bool        $allowInlineLineBreaks          Whether to allow inline breaks in log entries.
     * @param bool        $ignoreEmptyContextAndExtra     Whether to ignore empty context and extra entries.
     * @param bool        $includeStacktraces             Whether to include stack traces if present.
     */
    public function __construct(
        int $maxLineLength,
        ?string $format = null,
        ?string $dateFormat = null,
        bool $allowInlineLineBreaks = false,
        bool $ignoreEmptyContextAndExtra = false,
        bool $includeStacktraces = false,
    ) {
        // Mirror BaseLineFormatter defaults
        $this->format = $format ?? static::SIMPLE_FORMAT;
        $this->allowInlineLineBreaks = $allowInlineLineBreaks;
        $this->ignoreEmptyContextAndExtra = $ignoreEmptyContextAndExtra;
        $this->includeStacktraces($includeStacktraces);
        parent::__construct($dateFormat);

        $this->maxLineLength = $maxLineLength;
    }

    /**
     * {@inheritDoc}
     */
    public function format(array $record): string
    {
        // Truncate the raw message
        if (isset($record['message']) && mb_strlen($record['message']) > $this->maxLineLength) {
            $record['message'] = mb_substr($record['message'], 0, $this->maxLineLength).'…';
        }

        // Recursively truncate context items
        if (!empty($record['context'])) {
            $record['context'] = $this->truncate($record['context']);
        }

        // Recursively truncate extra items
        if (!empty($record['extra'])) {
            $record['extra'] = $this->truncate($record['extra']);
        }

        return parent::format($record);
    }

    /**
     * Recursively truncate strings in the given data to the max length.
     *
     * @param mixed $data Any string, array, or other data type.
     *
     * @return mixed Truncated data.
     */
    private function truncate($data)
    {
        if (is_string($data)) {
            return mb_strlen($data) > $this->maxLineLength
                ? mb_substr($data, 0, $this->maxLineLength).'…'
                : $data;
        }

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->truncate($value);
            }

            return $data;
        }

        return $data;
    }
}
