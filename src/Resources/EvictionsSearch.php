<?php

namespace Nickescobedo\Microbilt\Resources;


trait EvictionsSearch
{
    public function evictionsSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'EvictionsSearch/GetReport', $parameters);
    }

    public function evictionsSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'EvictionsSearch/GetArchiveReport', $parameters);
    }
}
