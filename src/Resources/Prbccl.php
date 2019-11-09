<?php

namespace Nickescobedo\Microbilt\Resources;

use Nickescobedo\Microbilt\Client;

class Prbccl extends Client
{
    public function getReport(array $parameters)
    {
        return $this->makeRequest('POST', 'PRBCCLReport/GetReport', $parameters);
    }

    public function getArchiveReport(array $parameters)
    {
        return $this->makeRequest('GET', 'PRBCCLReport/GetArchiveReport', $parameters);
    }

}
