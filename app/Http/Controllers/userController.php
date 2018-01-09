<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

        $this->middleware('log')->only('index');
        
    }

    public function index(User $id){


        $user = $id->id;

        return view('layouts.app', compact('user'));
    }
}
