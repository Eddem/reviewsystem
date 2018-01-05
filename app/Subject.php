<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment(Comment $comment, $userId)
    {
        $comment->user_id = $userId;
        
        return $this->comments()->save($comment);
    }


}
