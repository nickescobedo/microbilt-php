<?php

namespace NickEscobedo\MicroBilt\Resources;


trait DeathMasterFileValidation
{
    public function deathMasterFileValidation(array $parameters)
    {
        return $this->makeRequest('POST', 'DeathMasterFileValidation', $parameters);
    }
}
