<?php

namespace Nickescobedo\Microbilt\Resources;

trait IpAddressInfo
{
    public function ipAddressInfo(array $parameters)
    {
        return $this->makeRequest('POST', 'IPAddressInfo', $parameters);
    }
}
