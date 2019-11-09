<?php

namespace Nickescobedo\Microbilt\Resources;

trait PhoneSearch
{
    public function getReport(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneSearch', $parameters);
    }
}
