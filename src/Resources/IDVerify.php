<?php

namespace Nickescobedo\Microbilt\Resources;

trait IDVerify
{
    public function idVerify(array $parameters)
    {
        return $this->makeRequest('POST', 'IDVerify/GetReport', $parameters);
    }

    public function idVerifyArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'IDVerify/GetArchiveReport', $parameters);
    }
}
