<?php

namespace NickEscobedo\MicroBilt\Resources;

trait NadaVehicle
{
    public function nadaGetMakes(int $year)
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetMake', [
            'year' => $year,
        ]);
    }

    public function nadaGetStates()
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetStates');
    }

    public function nadaGetSeries(int $year, int $make)
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

    public function nadaGetBody(int $year, int $make, int $series)
    {
        return $this->makeRequest('GET', 'NADAVehiclePricing/GetBody', [
            'year' => $year,
            'make' => $make,
            'series' => $series,
        ]);
    }
}
