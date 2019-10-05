<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;

class JokesController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth')->except(['show','index']);
    }
    public function index()
    {
    	$jokes = Joke::all();
        //$joke = Joke::find(1);;
        //dd($joke->users->name);
    	return view('jokes.index',compact('jokes'));
    }

    public function create()
    {
    	return view('jokes.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required|min:10|max:120',
            'details' => 'required|min:20|',
            'image' => ['sometimes','image','mimes:jpg,jpeg,png']
        ]);
        
        $validated['user_id'] = auth()->user()->id;

        if(request()->has('image')) {
            $imageUploaded = request()->file('image');
            $imageName = time() . '.' . $imageUploaded->getClientOriginalExtension();
            $path = public_path('/images/');
            $imageUploaded->move($path, $imageName);
            $validated['image'] = '/images/' . $imageName;
            Joke::create($validated);
        } else {
            Joke::create($validated);
        }

        

        /*
    	$joke = new Joke();
    	$joke->author = request('author');
    	$joke->title = request('title');
    	$joke->details = request('details');
    
    	$joke->save();
        */

    	return redirect('/');
    }

    public function show(Joke $joke)
    {
        return view('jokes.show',compact('joke'));
        
        /*
    	$joke = Joke::find($id);
        dd($joke);
    	return view('jokes.show',compact('joke'));
        */
    }

    public function edit($id)
    {
    	$joke = Joke::find($id);

        if(auth()->user()->id !== $joke->user_id) {
            abort(404);
        }

    	return view('jokes.edit',compact('joke'));
    }

    public function destroy(Joke $joke)
    {
        if(auth()->user()->id !== $joke->user_id) {
            abort(404);
        }
        $joke->delete();
    	return redirect('/');
    }

    public function update(Joke $joke)
    {

        $validated = request()->validate([
            'title' => 'required|min:10|max:120',
            'details' => 'required|min:20|'
        ]);

        if(auth()->user()->id !== $joke->user_id) {
            abort(404);
        }

        $joke->update($validated);

        /*
    	$joke = Joke::find($id);
    	$joke->author = request('author');
    	$joke->title = request('title');
    	$joke->details = request('details');

    	$joke->save();
        */

    	return redirect('/');
    }
}
