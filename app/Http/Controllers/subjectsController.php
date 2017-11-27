<?php

namespace App\Http\Controllers;

use DB;

use App\S;

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

    public function show($id)
    {

        $subject = DB::table('subjects')->find($id);
        return view('subjects.show', compact('subject'));

    }

}
