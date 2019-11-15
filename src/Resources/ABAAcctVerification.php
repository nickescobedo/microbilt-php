<?php

namespace NickEscobedo\MicroBilt\Resources;


trait ABAAcctVerification
{
    public function aBAAcctVerification(string $routingNumber, string $accountNumber)
    {
        return $this->makeRequest('POST', 'ABAAcctVerification', [
            'BankRoutingNumber' => $routingNumber,
            'BankAccountNumber' => $accountNumber,
        ]);
    }
}
