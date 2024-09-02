<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class category extends Controller
{
    public function index()
    {
         return view('categoryPosts');
    }
}
