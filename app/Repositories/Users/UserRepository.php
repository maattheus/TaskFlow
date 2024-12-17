<?php

namespace App\Repositories\Users;

use App\Models\User;

class UserRepository implements UserInterface
{

    public function create($data)
    {

        return User::create($data);
  
    }


    public function getUserById($id)
    {

        return User::findOrFail($id); 

    }

}