<?php

namespace App\Zad2\Fetcher;

use App\Zad2\Factory\GuzzleClientFactory;
use App\Zad2\Interfaces\UrlFetcherInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UrlFetcher implements UrlFetcherInterface
{
    /** @var GuzzleClientFactory $clientFactory */
    private $clientFactory;
    
    public function __construct(GuzzleClientFactory $guzzleClientFactory)
    {
        $this->clientFactory = $guzzleClientFactory;
    }
    
    /**
     * @throws GuzzleException
     * @return mixed[]
     */
    public function fetch(string $url): array
    {
        $client = $this->clientFactory->make([]);
        
        try {
            $response = $client->get($url);
        } catch (GuzzleException $exception) {
            throw new Exception('Cannot fetch data');
        }
        
        return json_decode($response->getBody()->getContents(), true);
    }
}