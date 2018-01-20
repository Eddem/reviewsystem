<?php

namespace App\Http\Controllers;

use App\Subject;
use DB;


use Illuminate\Support\Facades\Auth;
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
        $this->validate($request, [
            'name' => 'required|string|min:10|max:30',
            'description' => 'required|string|min:5|max:250',
        ]);

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->user_id = $id->id;

        $subject->save();
        
        return back();
    }
    
    public function search()
    {
        $subject = new Subject();


        $value = Input::get('search');
//


        $subjects = $subject->where('name', 'LIKE', '%'.$value.'%')->get();




        return view('subjects.index', compact('subjects'));

        
    }

    public function filter(Request $request)
    {

        $value = $request->filter;

        if ($value == 1){
            $userSubjects = Auth::user()->load('subjects');
            $results =  $userSubjects->subjects;

            return view('subjects.index', compact('results'));
        }else{
            return view('subjects.index', compact('results'));
        }



    }



}
