<?php

namespace Nickescobedo\Microbilt\Resources;


trait BankAccountSearch
{
    public function bankAccountSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'BankAccountSearch/GetReport', $parameters);
    }

    public function bankAccountSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'BankAccountSearch/GetArchiveReport', $parameters);
    }
}
