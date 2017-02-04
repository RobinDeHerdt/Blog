<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Blogpost;
use Session;

class BlogpostController extends Controller
{
    public function index() 
    {
    	$blogposts = Blogpost::all();

    	return view('blogpost_overview', [
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

        Session::flash('create_status', 'Post created successfully');

    	return redirect('/');
    }

    public function edit($id)
    {
        $blogpost = Blogpost::find($id);

        return view('blogpost_edit', [
            'blogpost'      => $blogpost
        ]);
    }

    public function update($id, Request $request)
    {
        $blogpost = Blogpost::find($id);
        
        $blogpost->title    = $request->title;
        $blogpost->body     = $request->body;

        $blogpost->save();

        Session::flash('update_status', 'Post updated successfully');

        return redirect('/blogposts');
    }

    public function destroy($id)
    {
        $blogpost = Blogpost::find($id);
        $blogpost->delete();

        Session::flash('delete_status', 'Post deleted successfully');

        return back();
    }
}
