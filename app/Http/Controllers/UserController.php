<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Retrieve a user and display it
     */
    public function show($id) 
    {
        $user = User::find($id);
        return view('/show', array('user' => $user));
    }

    /**
     * List all the users
     */
    public function list() 
    {
        return view('/list', array('users' => User::all()));
    }

    /**
     * List all the users but with authentication
     */
    public function display()
    {
        $usersQuery = User::all();
        if (Gate::denies('admin_functionality')) {
            $usersQuery = $usersQuery->where('id', auth()->user()->id);
        }
        return view('/display', array('users'=>$usersQuery));
    }
}
