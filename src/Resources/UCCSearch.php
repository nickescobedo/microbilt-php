<?php

namespace Nickescobedo\Microbilt\Resources;


trait UCCSearch
{
    public function uccSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'UCCSearchReport/GetReport', $parameters);
    }

    public function uccSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'UCCSearchReport/GetArchiveReport', $parameters);
    }
}
