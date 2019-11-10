<?php

namespace Nickescobedo\Microbilt\Resources;


trait ProfessionalLicenseSearch
{
    public function professionalLicenseSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'ProfessionalLicenseSearch/GetReport', $parameters);
    }

    public function professionalLicenseSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'ProfessionalLicenseSearch/GetArchiveReport', $parameters);
    }
}
