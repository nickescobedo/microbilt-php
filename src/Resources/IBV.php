<?php

namespace Nickescobedo\Microbilt\Resources;


trait IBV
{
    public function ibvCreateForm(array $parameters)
    {
        return $this->makeRequest('POST', 'ibv/CreateForm', $parameters);
    }

    public function ibvGetReport(array $parameters)
    {
        return $this->makeRequest('GET', 'ibv/GetReport', $parameters);
    }
}
