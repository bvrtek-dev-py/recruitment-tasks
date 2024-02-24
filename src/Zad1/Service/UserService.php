<?php

namespace App\Zad1\Service;

use App\Zad1\DTO\UserDTO;
use App\Zad1\Factory\UserDTOFactory;
use App\Zad1\Interfaces\UserServiceInterface;
use App\Zad1\Repository\UserRepository;

class UserService implements UserServiceInterface
{
    /** in PHP >= 8.0 I would use private UserRepository $userRepository */
    /** @var UserRepository */
    private $userRepository;
    /** @var UserDTOFactory $userDTOFactory */
    private $userDTOFactory;
    
    public function __construct(UserRepository $userRepository, UserDTOFactory $userDTOFactory)
    {
        $this->userRepository = $userRepository;
        $this->userDTOFactory = $userDTOFactory;
    }
    
    /** @return UserDTO[] */
    public function getAll(): array
    {
        return array_map(
            function (array $data) {
                return $this->userDTOFactory->make($data);
            },
            $this->userRepository->getAll()
        );
    }
}