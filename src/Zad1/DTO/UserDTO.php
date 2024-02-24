<?php

namespace App\Zad1\DTO;

class UserDTO
{
    public $name;
    // In PHP >= 8.0 I would mark this field as readonly
    // Readonly makes field immutable
    
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}