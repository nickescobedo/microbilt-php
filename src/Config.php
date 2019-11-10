<?php

namespace NickEscobedo\MicroBilt;


class Config
{

    protected static $defaultOptions = [
        'productionApiUrl' => 'https://api.microbilt.com',
        'sandboxApiUrl' => 'https://apitest.microbilt.com',

        'mode' => 'prod',
    ];


    protected static $settings = [];

    public static function setOptions(array $options = [])
    {
        static::$settings = array_merge(static::$defaultOptions, $options);

        return static::$settings;
    }

    public static function get(string $key)
    {
        return static::$settings[$key];
    }

}
