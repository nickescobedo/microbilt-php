<?php

namespace NickEscobedo\MicroBilt\Resources;

trait SSNValidation
{
    public function ssnValidation(string $ssn)
    {
        return $this->makeRequest('POST', 'SSNValidation', [
            'SSN' => $ssn
        ]);
    }
}
