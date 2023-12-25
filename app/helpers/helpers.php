<?php

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'd/m/Y')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}
