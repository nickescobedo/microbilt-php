<?php

namespace Nickescobedo\Microbilt;

use function GuzzleHttp\Psr7\stream_for;
use Nickescobedo\Microbilt\Resources\ABAAcctVerification;
use Nickescobedo\Microbilt\Resources\ACHCheckPrescreen;
use Nickescobedo\Microbilt\Resources\ACHCheckPrescreenExtended;
use Nickescobedo\Microbilt\Resources\AddressNameVerification;
use Nickescobedo\Microbilt\Resources\AddressStandardization;
use Nickescobedo\Microbilt\Resources\BankAccountSearch;
use Nickescobedo\Microbilt\Resources\BankAccountVerifyAdvantage;
use Nickescobedo\Microbilt\Resources\BankruptcySearch;
use Nickescobedo\Microbilt\Resources\CriminalSearch;
use Nickescobedo\Microbilt\Resources\DeathMasterFileValidation;
use Nickescobedo\Microbilt\Resources\DiversLicenseSearch;
use Nickescobedo\Microbilt\Resources\DriversLicenseFormatValidation;
use Nickescobedo\Microbilt\Resources\EmailSearch;
use Nickescobedo\Microbilt\Resources\EmailValidation;
use Nickescobedo\Microbilt\Resources\EmploymentSearch;
use Nickescobedo\Microbilt\Resources\EnhancedPeopleSearch;
use Nickescobedo\Microbilt\Resources\Equifax;
use Nickescobedo\Microbilt\Resources\EquifaxCanada;
use Nickescobedo\Microbilt\Resources\EvictionsSearch;
use Nickescobedo\Microbilt\Resources\Experian;
use Nickescobedo\Microbilt\Resources\IBV;
use Nickescobedo\Microbilt\Resources\IDVerify;
use Nickescobedo\Microbilt\Resources\IpAddressInfo;
use Nickescobedo\Microbilt\Resources\IPredict;
use Nickescobedo\Microbilt\Resources\MLAVerify;
use Nickescobedo\Microbilt\Resources\NadaVehicle;
use Nickescobedo\Microbilt\Resources\OFACWatchListSearch;
use Nickescobedo\Microbilt\Resources\PhoneAddressVerification;
use Nickescobedo\Microbilt\Resources\PhoneNameVerification;
use Nickescobedo\Microbilt\Resources\PhoneSearch;
use Nickescobedo\Microbilt\Resources\Prbccl;
use Nickescobedo\Microbilt\Resources\ProfessionalLicenseSearch;
use Nickescobedo\Microbilt\Resources\ReversePhoneSearch;
use Nickescobedo\Microbilt\Resources\SSNAddressVerification;
use Nickescobedo\Microbilt\Resources\SSNNameVerification;
use Nickescobedo\Microbilt\Resources\SSNPhoneVerification;
use Nickescobedo\Microbilt\Resources\SSNValidation;
use Nickescobedo\Microbilt\Resources\TraceDetail;
use Nickescobedo\Microbilt\Resources\TransUnion;
use Nickescobedo\Microbilt\Resources\UCCSearch;
use Nickescobedo\Microbilt\Resources\VehicleSearch;

class Client
{
    use PhoneSearch;
    use ReversePhoneSearch;
    use EmailSearch;
    use EnhancedPeopleSearch;
    use TraceDetail;
    use DiversLicenseSearch;
    use BankAccountSearch;
    use EmploymentSearch;
    use VehicleSearch;
    use BankruptcySearch;
    use EvictionsSearch;
    use CriminalSearch;
    use ProfessionalLicenseSearch;
    use UCCSearch;
    use ABAAcctVerification;
    use AddressStandardization;
    use AddressNameVerification;
    use DeathMasterFileValidation;
    use DriversLicenseFormatValidation;
    use EmailValidation;
    use IpAddressInfo;
    use NadaVehicle;
    use PhoneAddressVerification;
    use PhoneNameVerification;
    use SSNAddressVerification;
    use SSNNameVerification;
    use SSNPhoneVerification;
    use SSNValidation;
    use OFACWatchListSearch;
    use ACHCheckPrescreen;
    use BankAccountVerifyAdvantage;
    use Equifax;
    use EquifaxCanada;
    use Experian;
    use ACHCheckPrescreenExtended;
    use IBV;
    use IDVerify;
    use IPredict;
    use MLAVerify;
    use Prbccl;
    use TransUnion;

    protected $http;

    protected $httpClient;

    public function __construct(array $options = [])
    {
        Config::setOptions($options);

        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function getAccessToken(): string
    {
        $url = Config::get('productionApiUrl');

        if (Config::get('mode') !== 'prod') {
            $url = Config::get('sandboxApiUrl');
        }

        $url = $url . '/OAuth/GetAccessToken';

        $response = $this->httpClient->post($url, [
            'json' => [
                'client_id' => Config::get('client_id'),
                'client_secret' => Config::get('client_secret'),
                'grant_type' => 'client_credentials',
            ]
        ]);

        $parsedResponse = json_decode($response->getBody());

        return $parsedResponse->access_token;
    }

    public function makeRequest(string $verb, string $uri, array $parameters = [])
    {
        $url = Config::get('productionApiUrl');

        if (Config::get('mode') !== 'prod') {
            $url = Config::get('sandboxApiUrl');
        }

        $url = $url . '/' . $uri;

        $config['headers'] = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];

        if (!empty($parameters)) {
            if (strtolower($verb) == 'get') {
                $config['query'] = $parameters;
            } else {
                $config['json'] = $parameters;
            }
        }

        $response = $this->httpClient->$verb($url, $config);

        return json_decode($response->getBody());
    }
}
