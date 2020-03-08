<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $guarded = [];

    protected $with = ['creator']; // KADA SE DODA OVDE WITH, AUTOMATSKI OSTAJE MODELU
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
