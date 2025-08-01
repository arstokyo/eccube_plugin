<?php

namespace Plugin\AceClient43\Util\Logger;

class LineFormatter
{
    /**
     * Formats a log line.
     *
     * @param string $body The body of the log
     *
     * @return string The formatted log line
     */
    public static function format(string $body, int $max_length): string
    {
        if (mb_strlen($body) > $max_length) {
            $body = mb_substr($body, 0, $max_length - 3).'...';
        }

        return $body;
    }
}
