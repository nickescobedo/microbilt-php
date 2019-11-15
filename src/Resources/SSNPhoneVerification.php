<?php

namespace NickEscobedo\MicroBilt\Resources;

trait SSNPhoneVerification
{
    public function ssnPhoneVerification(string $ssn, string $phoneNumber)
    {
        return $this->makeRequest('POST', 'SSNPhoneVerification', [
            'SSN' => $ssn,
            'PhoneNumber' => $phoneNumber,
        ]);
    }
}
