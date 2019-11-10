<?php

namespace NickEscobedo\MicroBilt\Resources;

trait PhoneNameVerification
{
    public function phoneNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneNameVerification', $parameters);
    }
}
