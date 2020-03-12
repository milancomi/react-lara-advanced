<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

use App\StoryUsers;
class Story extends Model
{

    protected $guarded = [];

    protected $with = ['creator']; // KADA SE DODA OVDE WITH, AUTOMATSKI OSTAJE MODELU

    public function comments(){

        return $this->morphMany(Comment::class,'commentable');
    }



    public function getStoryTypeAttribute($value)
    {
        return ucfirst($value);
        // prvo slovo veliko
        // !!!!!!!!!!!!!!!!1
    }

    public function users()
    {
        return $this->hasMany(StoryUsers::class)->with('user');
    }
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // NA RELACIJI SE KACI DRUGA RELACIJA

    public function creator()
    {

        return $this->belongsTo(User::class,'user_id');

    }

}
