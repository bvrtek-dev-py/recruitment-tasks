<?php

namespace App\Zad2\Factory;

use App\Zad2\Interfaces\GuzzleClientFactoryInterface;
use GuzzleHttp\Client;

class GuzzleClientFactory implements GuzzleClientFactoryInterface
{
    /** @param mixed[] $config */
    public function make(array $config): Client
    {
        return new Client($config);
    }
}