<?php

namespace NickEscobedo\MicroBilt\Resources;

trait SSNAddressVerification
{
    public function ssnAddressVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNAddressVerification', $parameters);
    }
}
