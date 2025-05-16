<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use ApiResponse;
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        try{
            $users = $this->userService->getAllUsers();
            $data = [
                'users' => $users,
                'count' => count($users)
            ];
            return $this->success($data,"Users retrieved successfully");
        }catch(\Exception $e){
            return $this->error($e->getMessage(), 500);
        }
        
    }

    public function show(int $id){
        try {
            $users = $this->userService->getUserById($id);
            return $this->success($users, "User retrieved successfully");
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function store(Request $request){
        try {
            $data = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'confirm_password' =>'required|string'
            ]);
    
            $user = $this->userService->createUser($data);
            return $this->success($user, "User created successfully");
    
        } catch (ValidationException $e) {
            return $this->error('Validation Error', 422, $e->errors());
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function update(Request $request, int $id){
        try{
            $data = $request->validate([
                'name' =>'required',
                'email' =>'required|email|unique:users,email,'.$id,
            ]);
            $user = $this->userService->updateUser($id, $data);
            return $this->success($user, "User updated successfully");
        } catch (ValidationException $e) {
            return $this->error('Validation Error', 422, $e->errors());
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function destroy(int $id){
        try{
            $this->userService->deleteUser($id);
            return $this->success(null, "User deleted successfully");
        }
        catch(\Exception $e){
            return $this->error($e->getMessage(), 500);
        }
    }

}
