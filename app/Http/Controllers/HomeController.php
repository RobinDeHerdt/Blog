<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogpost;

class HomeController extends Controller
{
    public function index() 
    {
        $blogposts = Blogpost::paginate(5)->sortByDesc('created_at');

        return view('home', [
            'blogposts'      => $blogposts
        ]);
    }
}
