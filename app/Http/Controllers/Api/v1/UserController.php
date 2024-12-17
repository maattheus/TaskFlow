<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {

        $this->userService = $userService;

    }

    public function create(CreateUserRequest $request)
    {

        try
        {

            $data = $request->validated();

            $user = $this->userService->create($data);

            return responseHandler([

                'message' => 'User created successfully',
                'status'  => 200,
                'data'    => $user

            ]);

        }catch(\Exception $e)
        {

            return responseHandler([

                'message' => 'There was an error creating the user',
                'status'  => 500,
                'data'    => $e->getMessage()

            ]);  

        }

    }


    public function getUserById($id)
    {

        try
        {

            $user = $this->userService->getUserById($id);

            return responseHandler([
                'message' => 'User found successfully',
                'status'  => 200,
                'data'    => $user
            ]);

        }catch(\Exception $e)
        {

            return responseHandler([
                'message' => 'There was an error fetching the user',
                'status'  => 500,
                'data'    => $e->getMessage()
            ]);

        }
    }
}
