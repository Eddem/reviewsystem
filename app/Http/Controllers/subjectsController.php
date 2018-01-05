<?php

namespace App\Http\Controllers;

use App\Subject;
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

        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    public function show(Subject $id)
    {

        $id->load('comments.user');
        

        return view('subjects.show', compact('id'));

    }



}
