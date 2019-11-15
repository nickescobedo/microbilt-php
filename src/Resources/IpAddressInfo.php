<?php

namespace NickEscobedo\MicroBilt\Resources;

trait IpAddressInfo
{
    public function ipAddressInfo(string $ip)
    {
        return $this->makeRequest('POST', 'IPAddressInfo', [
            'IP' => $ip
        ]);
    }
}
