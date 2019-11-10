<?php

namespace NickEscobedo\MicroBilt\Resources;


trait EmploymentSearch
{
    public function employmentSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'EmploymentSearch/GetReport', $parameters);
    }
}
