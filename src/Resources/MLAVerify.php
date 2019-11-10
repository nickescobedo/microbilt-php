<?php

namespace Nickescobedo\Microbilt\Resources;

trait MLAVerify
{
    public function mlaVerify(array $parameters)
    {
        return $this->makeRequest('POST', 'MLAVerify/GetReport', $parameters);
    }

    public function mlaVerifyArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'MLAVerify/GetArchiveReport', $parameters);
    }
}
