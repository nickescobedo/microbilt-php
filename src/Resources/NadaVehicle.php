<?php

namespace Nickescobedo\Microbilt\Resources;

trait NadaVehicle
{
    public function nadaGetMake(string $year)
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetMake', [
            'year' => $year,
        ]);
    }

    public function nadaGetStates()
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetStates');
    }

    public function nadaGetSeries(string $year, string $make)
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetSeries', [
            'year' => $year,
            'make' => $make,
        ]);
    }

    public function nadaGetReport(array $parameters)
    {
        return $this->makeRequest('POST', 'NADAVehiclePricing/GetReport', $parameters);
    }

    public function nadaGetYears()
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetYears');
    }

    public function nadaGetBody(string $year, string $make, string $series)
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetBody', [
            'year' => $year,
            'make' => $make,
            'series' => $series,
        ]);
    }
}
