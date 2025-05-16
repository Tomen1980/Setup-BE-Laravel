<?php

namespace App\Services;
use App\Exceptions\CustomException;
use App\Interface\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Cache;
class UserService 
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }


    public function getAllUsers(){
            return $this->userRepository->getAllUsers();
    }

    public function getUserById(int $id){
        return $this->userRepository->getUserById($id);
    }

    public function createUser(array $data){
        if($data['password'] !== $data['confirm_password']){
            throw new Exception('Password and confirm password must be same');
        }
        return $this->userRepository->createUser($data);
    }

    public function updateUser(int $id, array $data){
        return $this->userRepository->updateUser($id, $data);
    }

    public function deleteUser(int $id){
        return $this->userRepository->deleteUser($id);
    }
    
}
