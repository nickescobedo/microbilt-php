<?php

namespace NickEscobedo\MicroBilt;


class Config
{

    const PRODUCTION_URL = 'https://api.microbilt.com';

    const SANDBOX_URL = 'https://apitest.microbilt.com';

    protected static $defaultOptions = [
        'productionApiUrl' => self::PRODUCTION_URL,
        'sandboxApiUrl' => self::SANDBOX_URL,

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

    public static function getUrl(): string
    {
        if (self::get('mode') === 'prod') {
            return self::PRODUCTION_URL;
        }

        return self::SANDBOX_URL;
    }

}
