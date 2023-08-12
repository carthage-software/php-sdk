<?php

declare(strict_types=1);

use Carthage\Sdk\Client;
use GuzzleHttp\Client as GuzzleClient;

require_once __DIR__.'/../vendor/autoload.php';

$client = Client::create(new GuzzleClient([
    'base_uri' => 'https://localhost',
    'verify' => false,
]));

$pingResource = $client->ping();

echo "Server is up and running!\n";
echo "Server Time: {$pingResource->getTime()->format('Y-m-d H:i:s')}\n";
echo "Quote: {$pingResource->getQuote()}\n";

return $client;
