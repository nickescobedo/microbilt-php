<?php

namespace NickEscobedo\MicroBilt\Resources;


trait CriminalSearch
{
    public function criminalSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'CriminalSearch/GetReport', $parameters);
    }

    public function criminalSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'CriminalSearch/GetArchiveReport', $parameters);
    }
}
