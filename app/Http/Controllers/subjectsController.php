<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $subjects = DB::table('subjects')->get();

        return view('subjects.index', compact('subjects'));
    }

}
