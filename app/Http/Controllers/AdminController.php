<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;
    
            if ($usertype == 'user') {
                return view('dashboard');
            } 
            elseif ($usertype == 'admin') {
                return view('admin.index');
            } 
            else {
                return redirect()->back();
            }

        }
    }
    

}
