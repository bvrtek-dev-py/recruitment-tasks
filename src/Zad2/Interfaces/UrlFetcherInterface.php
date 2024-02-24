<?php

namespace App\Zad2\Interfaces;

interface UrlFetcherInterface
{
    /** @return mixed[] */
    public function fetch(string $url): array;
}