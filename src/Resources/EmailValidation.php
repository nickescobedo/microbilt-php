<?php

namespace Nickescobedo\Microbilt\Resources;

trait EmailValidation
{
    public function emailValidation(array $parameters)
    {
        return $this->makeRequest('POST', 'EmailValidation/GetReport', $parameters);
    }

    public function emailValidationArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'EmailValidation/GetArchiveReport', $parameters);
    }
}
