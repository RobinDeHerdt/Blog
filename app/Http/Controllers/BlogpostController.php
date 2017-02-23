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
    	$blogpost       = new Blogpost();

        $date           = $request->created_at; 
        $randomHour     = rand(18,23);
        $randomMinute   = rand(10,60);
        $randomSecond   = rand(10,60);

        // Format: 2017-02-23 14:05:06
        $datetime             = $date . ' ' . $randomHour . ':' . $randomMinute . ':' .$randomSecond;

    	$blogpost->title 	  = $request->title;
    	$blogpost->body 	  = $request->body;
        $blogpost->created_at = $datetime;
    	$blogpost->user_id	  = Auth::id();

    	$blogpost->save(['timestamps' => false]);

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
        
        $date           = $request->created_at; 
        $randomHour     = rand(18,23);
        $randomMinute   = rand(10,60);
        $randomSecond   = rand(10,60);

        // Format: 2017-02-23 14:05:06
        $datetime               = $date . ' ' . $randomHour . ':' . $randomMinute . ':' .$randomSecond;

        $blogpost->created_at   = $datetime;
        $blogpost->title        = $request->title;
        $blogpost->body         = $request->body;

        $blogpost->save(['timestamps' => false]);

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
