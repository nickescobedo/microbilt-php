<?php

namespace NickEscobedo\MicroBilt\Resources;


trait AddressNameVerification
{
    public function addressNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'AddressNameVerification', $parameters);
    }
}
