<?php

namespace Nickescobedo\Microbilt\Resources;

trait PhoneNameVerification
{
    public function phoneNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneNameVerification', $parameters);
    }
}
