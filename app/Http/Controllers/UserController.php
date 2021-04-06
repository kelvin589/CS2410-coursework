<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Retrieve a user and display it
     */
    public function show($id) {
        $user = User::find($id);
        return view('/show', array('user' => $user));
    }

    /**
     * List all the users
     */
    public function list() {
        return view('/list', array('users' => User::all()));
    }
}
