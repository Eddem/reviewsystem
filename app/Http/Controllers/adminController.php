<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use App\Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        $users->load('comments.subject');


        return view('dashboard', compact('users'));
    }


}
