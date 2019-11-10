<?php

namespace Nickescobedo\Microbilt\Resources;

trait PhoneSearch
{
    public function phoneSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'PhoneSearch', $parameters);
    }
}
