<?php

namespace NickEscobedo\MicroBilt\Resources;

trait Prbccl
{
    public function prbccl(array $parameters)
    {
        return $this->makeRequest('POST', 'PRBCCLReport/GetReport', $parameters);
    }

    public function prbcclArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'PRBCCLReport/GetArchiveReport', $parameters);
    }

}
