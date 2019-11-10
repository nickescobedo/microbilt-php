<?php

namespace Nickescobedo\Microbilt\Resources;


trait ACHCheckPrescreen
{
    public function achCheckPrescreen(array $parameters)
    {
        return $this->makeRequest('POST', 'ACHCheckPrescreen/GetReport', $parameters);
    }

    public function achCheckPrescreenArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'ACHCheckPrescreen/GetArchiveReport', $parameters);
    }
}
