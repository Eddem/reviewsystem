<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Comment;
use App\User;

use Auth;
use Illuminate\Http\Request;

class commentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, Subject $id)
    {

        $this->validate($request, [
            'comment' => 'required|string|regex:[A-Za-z1-9 ]|min:5|max:150|'
        ]);

        // modal methode
        $id->addComment(
            new Comment([
                'comment' => $request->comment
            ]),
            Auth::user()->id
        );



//        $id->comments()->create([
//            'comment' => $request->comment,
//            'user_id' => $id->subject_id
//        ]);

        return back();

    }

    public function delete(Request $request)
    {

        $id = $request->id;

        $comment = Comment::find($id);

        $user = Auth::user()->id;

        if($user == $comment->user_id) {
            $comment->delete();
        }

        return back();

    }

    public function edit(Comment $id)
    {

        
        $user = new User();

        if($user->isUser($id->user_id) == true){
            return view('comments.edit', compact('id'));
        }else{
            return back();
        }



    }

    public function update(Request $request, Comment $id)
    {
        $this->validate($request, [
            'comment' => 'required|string|regex:[A-Za-z1-9 ]|min:5|max:250',
        ]);

        $id->update($request->all());

        return back();

    }

}
