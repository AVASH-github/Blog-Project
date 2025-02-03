<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {  // Check if the user is not authenticated
            return redirect()->route('login'); // Redirect to login page (Change 'login' to your actual route)
        }

        $usertype = Auth::user()->usertype; // Get the user type

        if ($usertype == 'user') {
        
            return view('home.homepage');
        } 
        elseif ($usertype == 'admin') {
            return view('admin.index');
        } 
        else {
            return redirect()->back();
        }
    }

    public function homepage()
    {
        return view('home.homepage');
    }
}
