<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Subject extends Model
{
    use Searchable;

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

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    public function searchableAs()
    {
        return 'subjects_index';
    }


}
