<?php

namespace Nickescobedo\Microbilt\Resources;


trait ACHCheckPrescreenExtended
{
    public function achCheckPrescreenExtended(array $parameters)
    {
        return $this->makeRequest('POST', 'ACHCheckPrescreenExtended/GetReport', $parameters);
    }

    public function achCheckPrescreenExtendedArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'ACHCheckPrescreenExtended/GetArchiveReport', $parameters);
    }
}
