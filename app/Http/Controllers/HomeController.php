<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {   
        if (Auth::check()) { // Check if the user is authenticated
            $usertype = Auth::user()->usertype; // Get the user type
    
            if ($usertype === 'admin') {
                $post = Post::all(); // Fetch posts for admin
                return view('admin.adminhome', compact('post')); // Pass $posts to admin view
            } else { // Default to user homepage
                $post = Post::all(); // Fetch posts for users
                return view('home.homepage', compact('post')); // Pass $posts to user view
            }
        }
    
        return redirect()->route('login'); // Redirect to login if not authenticated
    }

    public function homepage()
    {
        $posts = Post::all();
        return view('home.homepage', compact('posts'));
    }
}
