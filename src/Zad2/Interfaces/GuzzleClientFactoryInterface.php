<?php

namespace App\Zad2\Interfaces;

use GuzzleHttp\Client;

interface GuzzleClientFactoryInterface
{
    /** @param mixed[] $config */
    public function make(array $config): Client;
}