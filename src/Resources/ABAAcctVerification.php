<?php

namespace NickEscobedo\MicroBilt\Resources;


trait ABAAcctVerification
{
    public function aBAAcctVerification(array $parameters)
    {
        return $this->makeRequest('POST', 'ABAAcctVerification', $parameters);
    }
}
