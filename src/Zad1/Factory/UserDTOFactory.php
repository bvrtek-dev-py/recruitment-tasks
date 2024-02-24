<?php

namespace App\Zad1\Factory;

use App\Zad1\DTO\UserDTO;

class UserDTOFactory
{
    /** @param mixed[] $data */
    public function make(array $data): UserDTO
    {
        return new UserDTO($data['name']);
    }
}