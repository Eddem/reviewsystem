<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Comment;
use App\User;

use Auth;
use Illuminate\Http\Request;

class commentsController extends Controller
{
    public function store(Request $request, Subject $id)
    {

        $this->validate($request, [
            'comment' => 'required|min:5|max:150|'
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

    public function edit(Comment $id)
    {

        return view('comments.edit', compact('id'));

    }

    public function update(Request $request, Comment $id)
    {

        $id->update($request->all());

        return back();

    }

}
