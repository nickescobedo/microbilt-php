<?php

namespace Nickescobedo\Microbilt\Resources;

trait BankAccountVerifyAdvantage
{
    public function bankAccountVerifyAdvantage(array $parameters)
    {
        return $this->makeRequest('POST', 'BAV/GetReport', $parameters);
    }

    public function bankAccountVerifyAdvantageArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'BAV/GetArchiveReport', $parameters);
    }
}
