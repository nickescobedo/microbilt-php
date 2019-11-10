<?php

namespace NickEscobedo\MicroBilt\Resources;

trait Experian
{
    public function experian(array $parameters)
    {
        return $this->makeRequest('POST', 'Experian/GetReport', $parameters);
    }

    public function experianArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'Experian/GetArchiveReport', $parameters);
    }
}
