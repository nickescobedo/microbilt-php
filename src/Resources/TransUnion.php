<?php

namespace NickEscobedo\MicroBilt\Resources;

trait TransUnion
{
    public function transUnion(array $parameters)
    {
        return $this->makeRequest('POST', 'TransUnion/GetReport', $parameters);
    }

    public function transUnionArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'TransUnion/GetArchiveReport', $parameters);
    }
}
