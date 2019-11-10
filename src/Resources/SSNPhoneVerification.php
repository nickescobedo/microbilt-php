<?php

namespace NickEscobedo\MicroBilt\Resources;

trait SSNPhoneVerification
{
    public function ssnPhoneVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNPhoneVerification', $parameters);
    }
}
