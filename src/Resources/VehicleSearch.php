<?php

namespace Nickescobedo\Microbilt\Resources;


trait VehicleSearch
{
    public function vehicleSearch(array $parameters)
    {
        return $this->makeRequest('POST', 'VehicleSearch/GetReport', $parameters);
    }

    public function vehicleSearchArchive(array $parameters)
    {
        return $this->makeRequest('GET', 'VehicleSearch/GetArchiveReport', $parameters);
    }
}
