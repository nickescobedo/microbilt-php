<?php

namespace NickEscobedo\MicroBilt\Resources;

trait EmailValidation
{
    public function emailValidation(string $email)
    {
        return $this->makeRequest('POST', 'EmailValidation/GetReport', [
            'EmailAddr' => $email,
        ]);
    }

    public function emailValidationArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'EmailValidation/GetArchiveReport', $parameters);
    }
}
