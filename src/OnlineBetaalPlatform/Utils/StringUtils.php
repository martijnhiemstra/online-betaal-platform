<?php

namespace OnlineBetaalPlatform\Utils;

class StringUtils
{

    /**
     * Determine if the haystack ends with the needle 
     * 
     * @param String The string to look in
     * @param String The string to find in the haystack
     * 
     * @return bool If the needle is found at the end of the haystack
     */
    public static function endsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    /**
     * Determine if the haystack startswith with the needle 
     * 
     * @param String The string to look in
     * @param String The string to find in the haystack
     * 
     * @return bool If the needle is found at the start of the haystack
     */
    public static function startsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
}
