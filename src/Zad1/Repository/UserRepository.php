<?php

namespace App\Zad1\Repository;

use App\Zad1\Interfaces\UserRepositoryInterface;
use Exception;
use PDO;

const GET_ALL_USERS_QUERY = 'SELECT * FROM users';

class UserRepository implements UserRepositoryInterface
{
    private $database;
    
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }
    
    /** @return mixed[] */
    public function getAll(): array
    {
        $query = $this->database->query(GET_ALL_USERS_QUERY);
        
        if (!$query) {
            throw new Exception("Error while fetching data");
        }
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}