<?php

namespace NickEscobedo\MicroBilt\Resources;

trait EquifaxCanada
{
    public function equifaxCanada(array $parameters)
    {
        return $this->makeRequest('POST', 'EquifaxCA/GetReport', $parameters);
    }

    public function equifaxCanadaArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'EquifaxCA/GetArchiveReport', $parameters);
    }
}
