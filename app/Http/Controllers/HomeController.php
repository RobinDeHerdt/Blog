<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogpost;

class HomeController extends Controller
{
    public function index() 
    {
        $blogposts = Blogpost::orderBy('created_at','desc')->paginate(5);

        return view('home', [
            'blogposts'      => $blogposts
        ]);
    }
}
