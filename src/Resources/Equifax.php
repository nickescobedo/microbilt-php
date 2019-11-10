<?php

namespace NickEscobedo\MicroBilt\Resources;

trait Equifax
{
    public function equifax(array $parameters)
    {
        return $this->makeRequest('POST', 'Equifax/GetReport', $parameters);
    }

    public function equifaxArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'Equifax/GetArchiveReport', $parameters);
    }
}
