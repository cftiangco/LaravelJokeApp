<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    //

    protected $fillable = [
    	'title',
    	'details',
        'user_id',
        'image'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
