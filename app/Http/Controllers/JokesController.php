<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;

class JokesController extends Controller
{
    //
    public function index()
    {
    	$jokes = Joke::all();
    	return view('jokes.index',compact('jokes'));
    }

    public function create()
    {
    	return view('jokes.create');
    }

    public function store()
    {
    	$joke = new Joke();
    	$joke->author = request('author');
    	$joke->title = request('title');
    	$joke->details = request('details');

    	$joke->save();

    	return redirect('/');
    }

    public function show($id)
    {
    	$joke = Joke::find($id);
    	return view('jokes.show',compact('joke'));
    }

    public function edit($id)
    {
    	$joke = Joke::find($id);
    	return view('jokes.edit',compact('joke'));
    }

    public function destroy($id)
    {
    	Joke::find($id)->delete();
    	return redirect('/');
    }

    public function update($id)
    {
    	$joke = Joke::find($id);
    	$joke->author = request('author');
    	$joke->title = request('title');
    	$joke->details = request('details');

    	$joke->save();

    	return redirect('/');
    }
}
