<?php

namespace Nickescobedo\Microbilt\Resources;


trait BankruptcySearch
{
    public function bankruptcySearch(array $parameters)
    {
        return $this->makeRequest('POST', 'BankruptcySearch/GetReport', $parameters);
    }
}
