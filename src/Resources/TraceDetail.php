<?php

namespace NickEscobedo\MicroBilt\Resources;

trait TraceDetail
{
    public function traceDetail(array $parameters)
    {
        return $this->makeRequest('POST', 'TraceDetail/GetReport', $parameters);
    }

    public function traceDetailArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'TraceDetail/GetArchiveReport', $parameters);
    }
}
