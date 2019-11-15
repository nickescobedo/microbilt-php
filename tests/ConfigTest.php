<?php

namespace tests;

use NickEscobedo\MicroBilt\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testConfigDefaults()
    {
        $config = Config::setOptions();

        $this->assertEquals('https://api.microbilt.com', $config['productionApiUrl']);
        $this->assertEquals('https://apitest.microbilt.com', $config['sandboxApiUrl']);

        $this->assertEquals('prod', $config['mode']);
    }

    public function testSetConfigOptions()
    {
        Config::setOptions([
            'client_id' => '1',
            'client_secret' => '2'
        ]);

        $this->assertEquals('1', Config::get('client_id'));
        $this->assertEquals('2', Config::get('client_secret'));
    }
}
