<?php

namespace Nickescobedo\Microbilt\Resources;


trait ProfessionalLicenseSearch
{
    public function professionalLicenseSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'ProfessionalLicenseSearch/GetReport', $parameters);
    }
}
