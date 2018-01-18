<?php

namespace App\Http\Controllers;

use App\Subject;
use DB;


use Illuminate\Support\Facades\Input;

use Illuminate\Foundation\Auth\User;
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
    
    public function store(Request $request, User $id)
    {

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->user_id = $id->id;

        $subject->save();
        
        return back();
    }
    
    public function search()
    {


        $value = Input::get ( 'search' );
//
//        $subject = Subject::search($value)->get();


        $subjects = Subject::where('name', 'LIKE', '%'.$value.'%')->get();


        return view('subjects.index', compact('subjects'));

        
    }





}
