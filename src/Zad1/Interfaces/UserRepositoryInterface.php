<?php

namespace App\Zad1\Interfaces;

interface UserRepositoryInterface
{
    /** return @mixed[] */
    public function getAll(): array;
}