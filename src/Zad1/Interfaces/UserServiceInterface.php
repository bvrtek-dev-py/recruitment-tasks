<?php

namespace App\Zad1\Interfaces;

use App\Zad1\DTO\UserDTO;

interface UserServiceInterface
{
    /** @return UserDTO[] */
    public function getAll(): array;
}