<?php

namespace NickEscobedo\MicroBilt\Resources;


trait AddressStandardization
{
    public function addressStandardization(array $parameters)
    {
        return $this->makeRequest('POST', 'AddressStandardization', $parameters);
    }
}
