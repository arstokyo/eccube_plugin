<?php

namespace Plugin\AceClient43\Util\DataCollector;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;

/**
 * Enhanced data dumper for clean object/array rendering with indentation and toggle functionality
 */
class DataDumper
{
    /**
     * Dump data to HTML with proper indentation and toggle functionality
     */
    public function dumpToHtml($data): string
    {
        if ($data === null) {
            return '<span class="ace-dump-null">null</span>';
        }

        return $this->renderValue($data, 0, uniqid('ace_'));
    }

    /**
     * Render any value with proper formatting
     */
    private function renderValue($value, int $depth, string $uniqueId): string
    {
        if ($value === null) {
            return '<span class="ace-dump-null">null</span>';
        }

        if ($value instanceof AceDateTimeInterface) {
            try {
                return '<span class="ace-dump-str">"'.htmlspecialchars($value->toLongDate()).'"</span>';
            } catch (\Throwable $e) {
                return '<span class="ace-dump-error">AceDateTime (error: '.htmlspecialchars($e->getMessage()).')</span>';
            }
        }

        if (is_bool($value)) {
            return '<span class="ace-dump-bool">'.($value ? 'true' : 'false').'</span>';
        }

        if (is_int($value) || is_float($value)) {
            return '<span class="ace-dump-num">'.$value.'</span>';
        }

        if (is_string($value)) {
            return '<span class="ace-dump-str">"'.htmlspecialchars($value).'"</span>';
        }

        if (is_array($value)) {
            return $this->renderArray($value, $depth, $uniqueId);
        }

        if (is_object($value)) {
            return $this->renderObject($value, $depth, $uniqueId);
        }

        return '<span class="ace-dump-unknown">'.gettype($value).'</span>';
    }

    /**
     * Render array with proper indentation and toggle functionality
     */
    private function renderArray(array $array, int $depth, string $uniqueId): string
    {
        if (empty($array)) {
            return '<span class="ace-dump-array">[]</span>';
        }

        $count = count($array);
        $toggleId = $uniqueId.'_array_'.$depth;

        $output = '<div class="ace-dump-array">';
        $output .= '<span class="ace-dump-toggle ace-dump-collapsed" onclick="toggleAceElement(\''.$toggleId.'\')">';
        $output .= '<span class="ace-dump-arrow">▶</span> ';
        $output .= '<span class="ace-dump-type">Array</span>';
        $output .= '<span class="ace-dump-count">('.$count.')</span>';
        $output .= '</span>';

        $output .= '<div id="'.$toggleId.'" class="ace-dump-content ace-dump-hidden">';
        $output .= '<div class="ace-dump-bracket">[</div>';

        foreach ($array as $key => $value) {
            $output .= '<div class="ace-dump-item" style="margin-left: 20px;">';
            $output .= '<span class="ace-dump-key">';
            if (is_string($key)) {
                $output .= '"'.htmlspecialchars($key).'"';
            } else {
                $output .= $key;
            }
            $output .= '</span>';
            $output .= '<span class="ace-dump-arrow-right"> => </span>';
            $output .= $this->renderValue($value, $depth + 1, $uniqueId.'_'.$key);
            $output .= '</div>';
        }

        $output .= '<div class="ace-dump-bracket">]</div>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }

    /**
     * Render object with proper indentation and toggle functionality
     */
    private function renderObject($object, int $depth, string $uniqueId): string
    {
        $className = get_class($object);
        $toggleId = $uniqueId.'_object_'.$depth;

        try {
            $reflection = new \ReflectionObject($object);
            $properties = $reflection->getProperties();

            if (empty($properties)) {
                return '<span class="ace-dump-object">'.$this->renderClassWithTooltip($className).' {}</span>';
            }

            $output = '<div class="ace-dump-object">';
            $output .= '<span class="ace-dump-toggle ace-dump-collapsed" onclick="toggleAceElement(\''.$toggleId.'\')">';
            $output .= '<span class="ace-dump-arrow">▶</span> ';
            $output .= $this->renderClassWithTooltip($className);
            $output .= '<span class="ace-dump-count">('.count($properties).')</span>';
            $output .= '</span>';

            $output .= '<div id="'.$toggleId.'" class="ace-dump-content ace-dump-hidden">';
            $output .= '<div class="ace-dump-bracket">{</div>';

            foreach ($properties as $property) {
                try {
                    $property->setAccessible(true);
                    $name = $property->getName();

                    // FIXED: Check if property is initialized before accessing value
                    if (!$property->isInitialized($object)) {
                        $value = '<span class="ace-dump-uninitialized">[uninitialized]</span>';
                    } else {
                        $value = $this->renderValue($property->getValue($object), $depth + 1, $uniqueId.'_'.$name);
                    }

                    $visibility = '';
                    if ($property->isPrivate()) {
                        $visibility = '<span class="ace-dump-visibility ace-dump-private">private</span> ';
                    } elseif ($property->isProtected()) {
                        $visibility = '<span class="ace-dump-visibility ace-dump-protected">protected</span> ';
                    } else {
                        $visibility = '<span class="ace-dump-visibility ace-dump-public">public</span> ';
                    }

                    $output .= '<div class="ace-dump-property" style="margin-left: 20px;">';
                    $output .= $visibility;
                    $output .= '<span class="ace-dump-property-name">$'.htmlspecialchars($name).'</span>';
                    $output .= '<span class="ace-dump-arrow-right"> = </span>';
                    $output .= $value;
                    $output .= '</div>';
                } catch (\Error $e) {
                    // FIXED: Handle typed property access errors
                    $output .= '<div class="ace-dump-property" style="margin-left: 20px;">';
                    $output .= '<span class="ace-dump-visibility ace-dump-private">property</span> ';
                    $output .= '<span class="ace-dump-property-name">$'.htmlspecialchars($property->getName()).'</span>';
                    $output .= '<span class="ace-dump-arrow-right"> = </span>';
                    $output .= '<span class="ace-dump-error">[cannot access: '.htmlspecialchars($e->getMessage()).']</span>';
                    $output .= '</div>';
                } catch (\Throwable $e) {
                    // FIXED: Handle any other property access errors
                    $output .= '<div class="ace-dump-property" style="margin-left: 20px;">';
                    $output .= '<span class="ace-dump-visibility">property</span> ';
                    $output .= '<span class="ace-dump-property-name">$'.htmlspecialchars($property->getName()).'</span>';
                    $output .= '<span class="ace-dump-arrow-right"> = </span>';
                    $output .= '<span class="ace-dump-error">[error: '.htmlspecialchars($e->getMessage()).']</span>';
                    $output .= '</div>';
                }
            }

            $output .= '<div class="ace-dump-bracket">}</div>';
            $output .= '</div>';
            $output .= '</div>';

            return $output;
        } catch (\ReflectionException $e) {
            return '<span class="ace-dump-object ace-dump-error">'.$this->renderClassWithTooltip($className).' (reflection failed: '.htmlspecialchars($e->getMessage()).')</span>';
        }
    }

    /**
     * Get short class name without namespace
     */
    private function getShortClassName(string $fullClassName): string
    {
        $parts = explode('\\', $fullClassName);

        return end($parts);
    }

    /**
     * Render class name with tooltip - Fixed to use data-fqcn instead of title
     */
    private function renderClassWithTooltip($className, $shortName = null): string
    {
        $displayName = $shortName ?: $this->getShortClassName($className);

        return sprintf(
            '<span class="ace-dump-class" data-fqcn="%s">%s</span>',
            htmlspecialchars($className, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8')
        );
    }
}
