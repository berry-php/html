<?php

declare(strict_types=1);

namespace Berry;

use LogicException;
use InvalidArgumentException;

final class Escaper
{
    /** @codeCoverageIgnore */
    private function __construct()
    {
    }

    public static function escape(string $content): string
    {
        $content = str_replace("\0", '', $content);
        return htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    public static function escapeXml(string $content): string
    {
        return htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED | ENT_XML1, 'UTF-8');
    }

    /** Validate an XML 1.0 Name without changing its case or namespace prefix. */
    public static function xmlName(string $name): string
    {
        $start = ':A-Z_a-z\x{C0}-\x{D6}\x{D8}-\x{F6}\x{F8}-\x{2FF}\x{370}-\x{37D}\x{37F}-\x{1FFF}\x{200C}-\x{200D}\x{2070}-\x{218F}\x{2C00}-\x{2FEF}\x{3001}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFFD}\x{10000}-\x{EFFFF}';
        if (
            preg_match('/^[' . $start . '][' . $start . '\-.0-9\x{B7}\x{0300}-\x{036F}\x{203F}-\x{2040}]*$/uD', $name)
            !== 1
        ) {
            throw new InvalidArgumentException("Invalid XML name: {$name}");
        }

        return $name;
    }

    public static function escapeAttributeName(string $content): string
    {
        $escaped = str_replace("\0", '', $content);
        $escaped = strtolower($escaped); // attributes must be lower case
        $escaped = preg_replace('/[^a-z0-9\-_:@.]/', '', $escaped);

        if ($escaped === null) {
            throw new LogicException("Could not escape attribute: {$content}");
        }

        return $escaped;
    }
}
