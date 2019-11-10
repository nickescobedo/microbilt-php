<?php

namespace Nickescobedo\Microbilt\Resources;


trait ReversePhoneSearch
{
    public function reversePhoneSearch(string $phoneNumber)
    {
        return $this->makeRequest('POST', 'ReversePhoneSearch', [
            'PhoneNumber' => $phoneNumber
        ]);
    }
}
