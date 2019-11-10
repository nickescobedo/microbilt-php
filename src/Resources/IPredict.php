<?php

namespace NickEscobedo\MicroBilt\Resources;

trait IPredict
{
    public function iPredict(array $parameters)
    {
        return $this->makeRequest('POST', 'iPredict/GetReport', $parameters);
    }

    public function iPredictArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'iPredict/GetArchiveReport', $parameters);
    }
}
