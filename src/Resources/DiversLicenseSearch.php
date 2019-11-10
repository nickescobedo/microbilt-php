<?php

namespace Nickescobedo\Microbilt\Resources;


trait DiversLicenseSearch
{
    public function driversLicenseSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'DLSearch/GetReport', $parameters);
    }

    public function driversLicenseSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'DLSearch/GetArchiveReport', $parameters);
    }
}
