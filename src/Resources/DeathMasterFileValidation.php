<?php

namespace NickEscobedo\MicroBilt\Resources;


trait DeathMasterFileValidation
{
    public function deathMasterFileValidation(string $ssn, string $dateOfBirth)
    {
        return $this->makeRequest('POST', 'DeathMasterFileValidation', [
            'SSN' => $ssn,
            'DoB' => $dateOfBirth,
        ]);
    }
}
