<?php

namespace Nickescobedo\Microbilt\Resources;


trait AddressNameVerification
{
    public function addressNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'AddressNameVerification', $parameters);
    }
}
