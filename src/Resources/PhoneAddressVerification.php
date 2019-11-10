<?php

namespace NickEscobedo\MicroBilt\Resources;

trait PhoneAddressVerification
{
    public function phoneAddressVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneAddressVerification', $parameters);
    }
}
