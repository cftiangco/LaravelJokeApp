<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;
use App\Comment;

class CommentsController extends Controller
{
    //

    public function store(Joke $joke)
    {
    	request()->validate([
    		'comment' => 'required|min:5'
    	]);

    	Comment::create([
    		'joke_id' => $joke->id,
            'user_id' => auth()->user()->id,
    		'comment' => request('comment')
    	]);

    	return back();
    }

    public function destroy(Comment $comment) 
    {
        $comment->delete();

        return back();
    }
}
