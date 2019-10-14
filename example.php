<?php

require ('vendor/autoload.php');

$http = new \Nickescobedo\Microbilt\Http();

$client = new \Nickescobedo\Microbilt\Client([
    'client_id' => '',
    'client_secret' => '',
    'mode' => 'sandbox',
]);

var_dump($client->criminalSearch([
    'PersonInfo' => [
        'PersonName' => [
            'FirstName' => 'Yvonne',
            'LastName' => 'Gelinas',
        ],
        'ContactInfo' => [
            'PostAddr' => [
                'Addr1' => '48 Allenstown Rd',
                'PostalCode' => '03275',
            ]
        ],
        'BirthDt' => '1980-09-06',
    ]
]));
