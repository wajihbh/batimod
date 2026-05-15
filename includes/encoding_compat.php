<?php

/**
 * Remplace utf8_encode() / utf8_decode() (dépréciés en PHP 8.2+).
 * Nécessite l’extension mbstring.
 */
if (!function_exists('batimod_utf8_encode')) {
    function batimod_utf8_encode($string)
    {
        $s = (string) $string;

        if ($s === '') {
            return '';
        }

        if (mb_check_encoding($s, 'UTF-8')) {
            return $s;
        }

        return mb_convert_encoding($s, 'UTF-8', 'ISO-8859-1');
    }

    function batimod_utf8_decode($string)
    {
        $s = (string) $string;

        if ($s === '') {
            return '';
        }

        if (!mb_check_encoding($s, 'UTF-8')) {
            return $s;
        }

        return mb_convert_encoding($s, 'ISO-8859-1', 'UTF-8');
    }
}

if (function_exists('mb_internal_encoding')) {
    @mb_internal_encoding('UTF-8');
}
if (function_exists('mb_language')) {
    @mb_language('uni');
}
if (function_exists('mb_regex_encoding')) {
    @mb_regex_encoding('UTF-8');
}
