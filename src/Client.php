<?php

namespace NickEscobedo\MicroBilt;

use NickEscobedo\MicroBilt\Resources\ABAAcctVerification;
use NickEscobedo\MicroBilt\Resources\ACHCheckPrescreen;
use NickEscobedo\MicroBilt\Resources\ACHCheckPrescreenExtended;
use NickEscobedo\MicroBilt\Resources\AddressNameVerification;
use NickEscobedo\MicroBilt\Resources\AddressStandardization;
use NickEscobedo\MicroBilt\Resources\BankAccountSearch;
use NickEscobedo\MicroBilt\Resources\BankAccountVerifyAdvantage;
use NickEscobedo\MicroBilt\Resources\BankruptcySearch;
use NickEscobedo\MicroBilt\Resources\CriminalSearch;
use NickEscobedo\MicroBilt\Resources\DeathMasterFileValidation;
use NickEscobedo\MicroBilt\Resources\DiversLicenseSearch;
use NickEscobedo\MicroBilt\Resources\DriversLicenseFormatValidation;
use NickEscobedo\MicroBilt\Resources\EmailSearch;
use NickEscobedo\MicroBilt\Resources\EmailValidation;
use NickEscobedo\MicroBilt\Resources\EmploymentSearch;
use NickEscobedo\MicroBilt\Resources\EnhancedPeopleSearch;
use NickEscobedo\MicroBilt\Resources\Equifax;
use NickEscobedo\MicroBilt\Resources\EquifaxCanada;
use NickEscobedo\MicroBilt\Resources\EvictionsSearch;
use NickEscobedo\MicroBilt\Resources\Experian;
use NickEscobedo\MicroBilt\Resources\IBV;
use NickEscobedo\MicroBilt\Resources\IDVerify;
use NickEscobedo\MicroBilt\Resources\IpAddressInfo;
use NickEscobedo\MicroBilt\Resources\IPredict;
use NickEscobedo\MicroBilt\Resources\MLAVerify;
use NickEscobedo\MicroBilt\Resources\NadaVehicle;
use NickEscobedo\MicroBilt\Resources\OFACWatchListSearch;
use NickEscobedo\MicroBilt\Resources\PhoneAddressVerification;
use NickEscobedo\MicroBilt\Resources\PhoneNameVerification;
use NickEscobedo\MicroBilt\Resources\PhoneSearch;
use NickEscobedo\MicroBilt\Resources\Prbc;
use NickEscobedo\MicroBilt\Resources\Prbccl;
use NickEscobedo\MicroBilt\Resources\ProfessionalLicenseSearch;
use NickEscobedo\MicroBilt\Resources\ReversePhoneSearch;
use NickEscobedo\MicroBilt\Resources\SSNAddressVerification;
use NickEscobedo\MicroBilt\Resources\SSNNameVerification;
use NickEscobedo\MicroBilt\Resources\SSNPhoneVerification;
use NickEscobedo\MicroBilt\Resources\SSNValidation;
use NickEscobedo\MicroBilt\Resources\TraceDetail;
use NickEscobedo\MicroBilt\Resources\TransUnion;
use NickEscobedo\MicroBilt\Resources\UCCSearch;
use NickEscobedo\MicroBilt\Resources\VehicleSearch;

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
    use Prbc;
    use TransUnion;

    protected $httpClient;

    protected $accessToken;

    public function __construct(array $options = [])
    {
        Config::setOptions($options);

        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function setClient(\GuzzleHttp\Client $client)
    {
        $this->httpClient = $client;
    }

    protected function makeRequest(string $verb, string $uri, array $parameters = [])
    {
        $url = Config::get('productionApiUrl');

        if (Config::get('mode') !== 'prod') {
            $url = Config::get('sandboxApiUrl');
        }

        $url = $url . '/' . $uri;

        $config = [];
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

    private function getAccessToken(): string
    {
        if ($this->accessToken !== null) {
            return $this->accessToken;
        }

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

        $this->accessToken = $parsedResponse->access_token;

        return $this->accessToken;
    }
}
