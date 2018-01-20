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


        return view('admin.dashboard', compact('users'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;


        $user = User::find($id);


        $user->delete();

        $user->comments->each->delete();
        $user->subjects->each->delete();


        return back();
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // modal methode
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return back();
    }

    public function edit(User $id)
    {

        return view('admin.user.edit', compact('id'));

    }

    public function update(Request $request, User $id)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $id->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return back();

    }


}
