<?php

namespace Nickescobedo\Microbilt;

use function GuzzleHttp\Psr7\stream_for;
use Nickescobedo\Microbilt\Resources\BankAccountSearch;
use Nickescobedo\Microbilt\Resources\BankruptcySearch;
use Nickescobedo\Microbilt\Resources\DiversLicenseSearch;
use Nickescobedo\Microbilt\Resources\EmailSearch;
use Nickescobedo\Microbilt\Resources\EmploymentSearch;
use Nickescobedo\Microbilt\Resources\EnhancedPeopleSearch;
use Nickescobedo\Microbilt\Resources\EvictionsSearch;
use Nickescobedo\Microbilt\Resources\PhoneSearch;
use Nickescobedo\Microbilt\Resources\ReversePhoneSearch;
use Nickescobedo\Microbilt\Resources\TraceDetail;
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

    protected $http;

    protected $httpClient;

    public function __construct(array $options = [])
    {
        Config::setOptions($options);

        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function addressNameVerification(array $attributes)
    {
        $token = $this->getAccessToken();

        $request = $this
            ->createRequest('POST', '/AddressNameVerification', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])
            ->withBody(stream_for(json_encode($attributes)));

        $response = $this->httpClient->send($request);

        return json_decode($response->getBody());
    }

    public function criminalSearch(array $attributes)
    {
        $token = $this->getAccessToken();

        $request = $this
            ->createRequest('POST', '/CriminalSearch/GetReport', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])
            ->withBody(stream_for(json_encode($attributes)));

        $response = $this->httpClient->send($request);

        return json_decode($response->getBody());
    }

    public function phoneNameVerification(array $attributes)
    {
        $token = $this->getAccessToken();

        $request = $this
            ->createRequest('POST', '/PhoneNameVerification', [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])
            ->withBody(stream_for(json_encode($attributes)));

        $response = $this->httpClient->send($request);

        return json_decode($response->getBody());
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
