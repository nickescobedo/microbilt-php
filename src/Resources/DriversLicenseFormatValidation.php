<?php

namespace Nickescobedo\Microbilt\Resources;

trait DriversLicenseFormatValidation
{
    public function driversLicenseVerify(array $parameters)
    {
        return $this->makeRequest('POST', 'DLVerify/GetReport', $parameters);
    }

    public function driversLicenseVerifyArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'DLVerify/GetArchiveReport', $parameters);
    }
}
