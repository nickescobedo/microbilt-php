<?php

namespace Nickescobedo\Microbilt\Resources;

trait SSNPhoneVerification
{
    public function ssnPhoneVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNPhoneVerification', $parameters);
    }
}
