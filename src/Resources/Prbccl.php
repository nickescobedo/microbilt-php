<?php

namespace NickEscobedo\MicroBilt\Resources;

trait Prbccl
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
