<?php

namespace NickEscobedo\MicroBilt\Resources;

trait EnhancedPeopleSearch
{
    public function enhancedPeopleSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'EnhancedPeopleSearch/GetReport', $parameters);
    }

    public function enhancedPeopleSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'EnhancedPeopleSearch/GetArchiveReport', $parameters);
    }
}
