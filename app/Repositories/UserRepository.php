<?php

namespace App\Repositories;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Models\User;
use Cache;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers(){
        return Cache::remember('users', 60 * 5, function () {
            return User::get();
        });
    }

    public function getUserById(int $id){
        return Cache::remember('user_' . $id, 60 * 5, function () use ($id) {
            $data = User::find($id);
            if (isset($data)) {
                return $data;
            } else {
                throw new Exception('User not found', 404);
            }
        });
    }

    public function createUser(array $data){
        $data = User::create($data);
        Cache::forget('users');
        return $data;
    }

    public function updateUser(int $id, array $data){
        $user = User::find($id);
        $user->update($data);
        Cache::forget('users');
        Cache::forget('user_'. $id);
        return $user;
    }

    public function deleteUser(int $id){
        $user = User::find($id);
        if (!isset($user)) {
            throw new Exception('User not found', 404);
        }
        $user->delete();
        Cache::forget('users');
        Cache::forget('user_' . $id);
    }
}
