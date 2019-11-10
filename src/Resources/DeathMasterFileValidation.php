<?php

namespace Nickescobedo\Microbilt\Resources;


trait DeathMasterFileValidation
{
    public function deathMasterFileValidation(array $parameters)
    {
        return $this->makeRequest('POST', 'DeathMasterFileValidation', $parameters);
    }
}
