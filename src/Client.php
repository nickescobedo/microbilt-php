<?php

namespace Nickescobedo\Microbilt;

use GuzzleHttp\Psr7\Request;
use function GuzzleHttp\Psr7\stream_for;

class Client
{
    protected $http;

    protected $httpClient;

    public function __construct(array $options = [])
    {
        Config::setOptions($options);

        $this->http = new Http();

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

    public function getAccessToken(): string
    {
        $request = $this->createRequest('POST', '/OAuth/GetAccessToken');

        $request->withBody(stream_for(json_encode([
            'client_id' => Config::get('client_id'),
            'client_secret' => Config::get('client_secret'),
            'grant_type' => 'client_credentials',
        ])));

        $response = $this->httpClient->send($request);

        $parsedResponse = json_decode($response->getBody());

        return $parsedResponse->access_token;
    }

    private function createRequest(string $verb, string $uri, array $headers = [])
    {
        $url = Config::get('productionApiUrl');

        if (Config::get('mode') !== 'prod') {
            $url = Config::get('sandboxApiUrl');
        }

        $url = $url . $uri;

        $request = new Request($verb, $url, $headers);

        return $request;
    }
}
