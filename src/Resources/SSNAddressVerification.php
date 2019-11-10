<?php

namespace Nickescobedo\Microbilt\Resources;

trait SSNAddressVerification
{
    public function ssnAddressVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNAddressVerification', $parameters);
    }
}
