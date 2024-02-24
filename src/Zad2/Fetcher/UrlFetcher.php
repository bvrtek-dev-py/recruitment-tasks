<?php

namespace App\Zad2\Fetcher;

use App\Zad2\Interfaces\UrlFetcherInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UrlFetcher implements UrlFetcherInterface
{
    /**
     * @throws GuzzleException
     * @return mixed[]
     */
    public function fetch(string $url): array
    {
        $client = $this->getHttpClient();
        
        try {
            $response = $client->get($url);
        } catch (GuzzleException $exception) {
            throw new Exception('Cannot fetch data');
        }
        
        return json_decode($response->getBody()->getContents(), true);
    }
    
    private function getHttpClient(): Client
    {
        return new Client([]);
    }
}