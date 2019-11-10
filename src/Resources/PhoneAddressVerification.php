<?php

namespace Nickescobedo\Microbilt\Resources;

trait PhoneAddressVerification
{
    public function phoneAddressVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneAddressVerification', $parameters);
    }
}
