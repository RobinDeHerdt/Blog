<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Blogpost;

class BlogpostController extends Controller
{
    public function index() 
    {
    	$blogposts = Blogpost::all();

    	return view('home', [
			'blogposts'      => $blogposts
		]);
    }

    public function create() 
    {
    	return view('blogpost_create');
    }

    public function store(Request $request)
    {
    	$blogpost = new Blogpost();

    	$blogpost->title 	= $request->title;
    	$blogpost->body 	= $request->body;
    	$blogpost->user_id	= Auth::id();

    	$blogpost->save();

    	return redirect('/');
    }
}
