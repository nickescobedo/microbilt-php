<?php

namespace NickEscobedo\MicroBilt\Resources;

trait SSNNameVerification
{
    public function ssnNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNNameVerification', $parameters);
    }
}
