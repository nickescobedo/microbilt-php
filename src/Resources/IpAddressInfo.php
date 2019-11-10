<?php

namespace NickEscobedo\MicroBilt\Resources;

trait IpAddressInfo
{
    public function ipAddressInfo(array $parameters)
    {
        return $this->makeRequest('POST', 'IPAddressInfo', $parameters);
    }
}
