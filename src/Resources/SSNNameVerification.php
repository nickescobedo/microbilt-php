<?php

namespace Nickescobedo\Microbilt\Resources;

trait SSNNameVerification
{
    public function ssnNameVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'SSNNameVerification', $parameters);
    }
}
