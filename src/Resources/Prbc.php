<?php

namespace NickEscobedo\MicroBilt\Resources;

trait Prbc
{
    public function prbc(array $parameters)
    {
        return $this->makeRequest('POST', 'PRBC/GetReport', $parameters);
    }

    public function prbcArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'PRBC/GetArchiveReport', $parameters);
    }

}
