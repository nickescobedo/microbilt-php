# Microbilt PHP
![](https://travis-ci.org/nickescobedo/microbilt-php.svg?branch=master)

A PHP client for consuming the Microbilt web services API.

https://developer.microbilt.com

# Installation

`composer require nickescobedo/microbilt-php`

# Quick Start

```
$client = new \NickEscobedo\MicroBilt\Client([
    'client_id' => '',
    'client_secret' => '',
]);

$transUnionReport = $client->transUnion(['your data parameters here']);
```

# Configuration

`client_id` required

`client_secret` required

`mode` optional (defaults to live). Other option is sandbox.


# Usage
See https://developer.microbilt.com for the necessary parameters to pass in to each function. Data should be passed in as an array. The array is converted to JSON before sending to their API.

```
$client = new \NickEscobedo\MicroBilt\Client([
    'client_id' => '',
    'client_secret' => '',
]);

// Data structure taken from https://developer.microbilt.com/transunion/apis/post/GetReport
$client->transUnion([
    "PersonInfo"=> [
        "PersonName"=> [
            "FirstName"=> '',
            "LastName"=> '',
            "MiddleName"=> '',
        ],
        "ContactInfo"=> [
            "PostAddr"=> [
                "StreetNum"=> '',
                "StreetName"=> '',
                "City"=> '',
                "StateProv"=> '',
                "PostalCode"=> '',
            ]
        ],
        "TINInfo"=> [
            "TINType"=> '1',
            "TaxId"=> '',
        ]
    ]
])
```
