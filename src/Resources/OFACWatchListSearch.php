<?php

namespace Nickescobedo\Microbilt\Resources;


trait OFACWatchListSearch
{
    public function ofacWatchListSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'OFACWatchlistSearch/GetReport', $parameters);
    }

    public function ofacWatchListSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'OFACWatchlistSearch/GetArchiveReport', $parameters);
    }
}
