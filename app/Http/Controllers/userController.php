<?php

namespace App\Http\Controllers;

use App\User;

use Auth;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index(User $id)
    {


        if($id->isUser($id->id) == true){
            return view('users.index', compact('id'));
        }else{
            return back();
        }

    }
    
    
    public function showSubjects (User $id)
    {

        $id->load('subjects.user');


        $user = new User();

        if($user->isUser($id->id) == true) {

            return view('users.index', compact('id'));
        }elseif($user->isUser(1) == true)
        {
            return view('users.index', compact('id'));
        }else{
            back();
        }


    }

    
    
}
