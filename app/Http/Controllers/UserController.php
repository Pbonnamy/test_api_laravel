<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function showOne($id)
    {
        return ['user' => User::findOrFail($id)]; 
    }

    public function showAll()
    {
        return ['user' => User::all()]; 
    }
}