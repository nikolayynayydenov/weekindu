<?php

namespace App\Helpers;


class StringModifier
{
    public static function convertToImagePath($str)
    {
        return preg_replace('/\s/', '-', strtolower($str)).'.jpg';
    }
}