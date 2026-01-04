<?php declare(strict_types=1);

namespace Berry\Rendering;

use LogicException;

final class Escaper
{
    /** @codeCoverageIgnore */
    private function __construct() {}

    public static function escape(string $content): string
    {
        $content = str_replace("\0", '', $content);
        return htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE);
    }

    public static function escapeAttributeName(string $content): string
    {
        $escaped = str_replace("\0", '', $content);
        $escaped = strtolower($escaped);  // attributes must be lower case
        $escaped = preg_replace('/[^a-z0-9\-_:]/', '', $escaped);

        if ($escaped === null) {
            throw new LogicException("Could not escape attribute: $content");
        }

        return $escaped;
    }
}
