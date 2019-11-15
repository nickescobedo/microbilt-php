<?php

namespace tests;

use GuzzleHttp\Psr7\Response;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NickEscobedo\MicroBilt\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @dataProvider provider
     */
    public function testApis(string $verb, string $resource, $guzzleData, string $functionName, ...$functionParameters)
    {
        $guzzleClient = $this->guzzleClient($verb, $resource, $guzzleData);

        $microbiltClient = new Client([
            'client_id' => '1',
            'client_secret' => '2'
        ]);
        $microbiltClient->setClient($guzzleClient);

        $microbiltClient->$functionName(...$functionParameters);
    }

    public function provider()
    {
        return [
            // verb      resource                      mockery expectation                                 client function      function parameters
            ['post', 'ABAAcctVerification', ['BankRoutingNumber' => '111', 'BankAccountNumber' => '222'], 'aBAAcctVerification', '111', '222'],

            ['post', 'AddressStandardization', ['test' => 'data'], 'addressStandardization', ['test' => 'data']],

            ['post', 'AddressNameVerification', ['test' => 'data'], 'addressNameVerification', ['test' => 'data']],

            ['post', 'DeathMasterFileValidation', ['SSN' => '111', 'DoB' => '222'], 'deathMasterFileValidation', '111', '222'],

            ['get', 'DLVerify/GetArchiveReport', ['test' => 'data'], 'driversLicenseVerifyArchive', ['test' => 'data']],
            ['post', 'DLVerify/GetReport', ['test' => 'data'], 'driversLicenseVerify', ['test' => 'data']],

            ['post', 'EmailSearch', ['test' => 'data'], 'emailSearch', ['test' => 'data']],

            ['get', 'EmailValidation/GetArchiveReport', ['test' => 'data'], 'emailValidationArchive', ['test' => 'data']],
            ['post', 'EmailValidation/GetReport', ['EmailAddr' => 'email@test.com'], 'emailValidation', 'email@test.com'],

            ['post', 'IPAddressInfo', ['IP' => '111.0.0.2'], 'ipAddressInfo', '111.0.0.2'],

            ['get', 'NADAVehiclePricing/GetMake', ['year' => 2019], 'nadaGetMakes', 2019],
            ['get', 'NADAVehiclePricing/GetStates', null, 'nadaGetStates'],
            ['get', 'NADAVehiclePricing/GetSeries', ['year' => 2019, 'make' => 2], 'nadaGetSeries', 2019, 2],
            ['post', 'NADAVehiclePricing/GetReport', ['test' => 'data'], 'nadaGetReport', ['test' => 'data']],
            ['get', 'NADAVehiclePricing/GetYears', null, 'nadaGetYears'],
            ['get', 'NADAVehiclePricing/GetBody', ['year' => 2019, 'make' => 2, 'series' => 4], 'nadaGetBody', 2019, 2, 4],

            ['post', 'PhoneAddressVerification', ['test' => 'data'], 'phoneAddressVerification', ['test' => 'data']],

            ['post', 'PhoneNameVerification', ['test' => 'data'], 'phoneNameVerification', ['test' => 'data']],

            ['post', 'PhoneSearch', ['test' => 'data'], 'phoneSearch', ['test' => 'data']],

            ['post', 'ProfessionalLicenseSearch/GetReport', ['test' => 'data'], 'professionalLicenseSearch', ['test' => 'data']],

            ['post', 'ReversePhoneSearch', ['PhoneNumber' => '111'], 'reversePhoneSearch', '111'],

            ['post', 'SSNAddressVerification', ['test' => 'data'], 'ssnAddressVerification', ['test' => 'data']],

            ['post', 'SSNNameVerification', ['test' => 'data'], 'ssnNameVerification', ['test' => 'data']],

            ['post', 'SSNPhoneVerification', ['SSN' => '11', 'PhoneNumber' => '123'], 'ssnPhoneVerification', '11', '123'],

            ['post', 'SSNValidation', ['SSN' => '11'], 'ssnValidation', '11'],

            ['get', 'OFACWatchlistSearch/GetArchiveReport', ['test' => 'data'], 'ofacWatchListSearchArchive', ['test' => 'data']],
            ['post', 'OFACWatchlistSearch/GetReport', ['test' => 'data'], 'ofacWatchListSearch', ['test' => 'data']],

            ['get', 'UCCSearchReport/GetArchiveReport', ['test' => 'data'], 'uccSearchArchive', ['test' => 'data']],
            ['post', 'UCCSearchReport/GetReport', ['test' => 'data'], 'uccSearch', ['test' => 'data']],

            ['get', 'ACHCheckPrescreen/GetArchiveReport', ['test' => 'data'], 'achCheckPrescreenArchive', ['test' => 'data']],
            ['post', 'ACHCheckPrescreen/GetReport', ['test' => 'data'], 'achCheckPrescreen', ['test' => 'data']],

            ['get', 'BankAccountSearch/GetArchiveReport', ['test' => 'data'], 'bankAccountSearchArchive', ['test' => 'data']],
            ['post', 'BankAccountSearch/GetReport', ['test' => 'data'], 'bankAccountSearch', ['test' => 'data']],

            ['get', 'BAV/GetArchiveReport', ['test' => 'data'], 'bankAccountVerifyAdvantageArchive', ['test' => 'data']],
            ['post', 'BAV/GetReport', ['test' => 'data'], 'bankAccountVerifyAdvantage', ['test' => 'data']],

            ['post', 'BankruptcySearch/GetReport', ['test' => 'data'], 'bankruptcySearch', ['test' => 'data']],

            ['get', 'CriminalSearch/GetArchiveReport', ['test' => 'data'], 'criminalSearchArchive', ['test' => 'data']],
            ['post', 'CriminalSearch/GetReport', ['test' => 'data'], 'criminalSearch', ['test' => 'data']],

            ['get', 'DLSearch/GetArchiveReport', ['test' => 'data'], 'driversLicenseSearchArchive', ['test' => 'data']],
            ['post', 'DLSearch/GetReport', ['test' => 'data'], 'driversLicenseSearch', ['test' => 'data']],

            ['get', 'EnhancedPeopleSearch/GetArchiveReport', ['test' => 'data'], 'enhancedPeopleSearchArchive', ['test' => 'data']],
            ['post', 'EnhancedPeopleSearch/GetReport', ['test' => 'data'], 'enhancedPeopleSearch', ['test' => 'data']],

            ['post', 'EmploymentSearch/GetReport', ['test' => 'data'], 'employmentSearch', ['test' => 'data']],

            ['get', 'Equifax/GetArchiveReport', ['test' => 'data'], 'equifaxArchive', ['test' => 'data']],
            ['post', 'Equifax/GetReport', ['test' => 'data'], 'equifax', ['test' => 'data']],

            ['get', 'EquifaxCA/GetArchiveReport', ['test' => 'data'], 'equifaxCanadaArchive', ['test' => 'data']],
            ['post', 'EquifaxCA/GetReport', ['test' => 'data'], 'equifaxCanada', ['test' => 'data']],

            ['get', 'EvictionsSearch/GetArchiveReport', ['test' => 'data'], 'evictionsSearchArchive', ['test' => 'data']],
            ['post', 'EvictionsSearch/GetReport', ['test' => 'data'], 'evictionsSearch', ['test' => 'data']],

            ['get', 'Experian/GetArchiveReport', ['test' => 'data'], 'experianArchive', ['test' => 'data']],
            ['post', 'Experian/GetReport', ['test' => 'data'], 'experian', ['test' => 'data']],

            ['get', 'ACHCheckPrescreenExtended/GetArchiveReport', ['test' => 'data'], 'achCheckPrescreenExtendedArchive', ['test' => 'data']],
            ['post', 'ACHCheckPrescreenExtended/GetReport', ['test' => 'data'], 'achCheckPrescreenExtended', ['test' => 'data']],

            ['post', 'ibv/CreateForm', ['test' => 'data'], 'ibvCreateForm', ['test' => 'data']],
            ['get', 'ibv/GetReport', ['test' => 'data'], 'ibvGetReport', ['test' => 'data']],

            ['get', 'IDVerify/GetArchiveReport', ['test' => 'data'], 'idVerifyArchive', ['test' => 'data']],
            ['post', 'IDVerify/GetReport', ['test' => 'data'], 'idVerify', ['test' => 'data']],

            ['get', 'iPredict/GetArchiveReport', ['test' => 'data'], 'iPredictArchive', ['test' => 'data']],
            ['post', 'iPredict/GetReport', ['test' => 'data'], 'iPredict', ['test' => 'data']],

            ['get', 'MLAVerify/GetArchiveReport', ['test' => 'data'], 'mlaVerifyArchive', ['test' => 'data']],
            ['post', 'MLAVerify/GetReport', ['test' => 'data'], 'mlaVerify', ['test' => 'data']],

            ['get', 'PRBCCLReport/GetArchiveReport', ['test' => 'data'], 'prbcclArchive', ['test' => 'data']],
            ['post', 'PRBCCLReport/GetReport', ['test' => 'data'], 'prbccl', ['test' => 'data']],

            ['get', 'PRBC/GetArchiveReport', ['test' => 'data'], 'prbcArchive', ['test' => 'data']],
            ['post', 'PRBC/GetReport', ['test' => 'data'], 'prbc', ['test' => 'data']],

            ['get', 'TraceDetail/GetArchiveReport', ['test' => 'data'], 'traceDetailArchive', ['test' => 'data']],
            ['post', 'TraceDetail/GetReport', ['test' => 'data'], 'traceDetail', ['test' => 'data']],

            ['get', 'TransUnion/GetArchiveReport', ['test' => 'data'], 'transUnionArchive', ['test' => 'data']],
            ['post', 'TransUnion/GetReport', ['test' => 'data'], 'transUnion', ['test' => 'data']],

            ['get', 'VehicleSearch/GetArchiveReport', ['test' => 'data'], 'vehicleSearchArchive', ['test' => 'data']],
            ['post', 'VehicleSearch/GetReport', ['test' => 'data'], 'vehicleSearch', ['test' => 'data']],
        ];
    }

    private function guzzleClient(string $verb, string $resource, $guzzleData): MockInterface
    {
        $guzzleClient = \Mockery::mock(\GuzzleHttp\Client::class);

        $guzzleClient->shouldReceive('post')
            ->with('https://api.microbilt.com/OAuth/GetAccessToken', [
                'json' => [
                    'client_id' => '1',
                    'client_secret' => '2',
                    'grant_type' => 'client_credentials',
                ],
            ])
            ->once()
            ->andReturn(new Response(200, [], '{"access_token": "1111"}'));

        $guzzleClient->shouldReceive($verb)
        ->with($this->getUrl($resource), $this->getGuzzleConfig($verb, $guzzleData))
        ->once()
        ->andReturn(new Response(200, [], '{"test": "response"}'));

        return $guzzleClient;
    }

    private function getGuzzleConfig(string $verb, $parameters): array
    {
        $config = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 1111',
            ],
        ];

        if ($parameters === null) {
            return $config;
        }

        if ($verb === 'get') {
            $config['query'] = $parameters;
        } else {
            $config['json'] = $parameters;
        }

        return $config;
    }

    private function getUrl(string $resource)
    {
        return 'https://api.microbilt.com/' . $resource;
    }
}
