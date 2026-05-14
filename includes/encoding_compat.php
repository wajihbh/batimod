<?php

declare(strict_types=1);

/**
 * Remplace utf8_encode() / utf8_decode() (dépréciés en PHP 8.2+) pour une exécution propre sous PHP 8.5.
 * Nécessite l’extension mbstring.
 */
if (!function_exists('batimod_utf8_encode')) {
    function batimod_utf8_encode(?string $string): string
    {
        if ($string === null || $string === '') {
            return '';
        }

        return mb_convert_encoding($string, 'UTF-8', 'ISO-8859-1');
    }

    function batimod_utf8_decode(?string $string): string
    {
        if ($string === null || $string === '') {
            return '';
        }

        return mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8');
    }
}
