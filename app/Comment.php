<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $guarded = [];
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function jokes()
    {
    	return $this->belongsTo(Joke::class);
    }
}
