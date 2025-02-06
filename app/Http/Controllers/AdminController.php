<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class AdminController extends Controller
{


    public function post_page()
    {
            return view('admin.post_page');
    }


    public function add_post(Request $request)
    {
            $user=Auth::user() ;

            $userid = $user->id;
            $user_name = $user->name;
            $usertype = $user->usertype;


            $post =new Post;

            $post->title = $request->title;

            $post->description = $request->description;

            $post->post_status='active';

            $post->user_id = $userid;
            $post->name = $user_name;
            $post->usertype =$usertype;

           $image = $request->image;

            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();

                $request->image->move('postimage',$imagename);
              
                $post->image = $imagename;
            }
         

            $post->save();

            return redirect()->back()->with('message','Post Added Successfully');
    }

        public function show_post()
        {

                $post= Post::all();



            return view('admin.show_post',compact('post'));
        }

    public function index()
    {
        if (!Auth::check()) {  // Redirect if not authenticated
            return redirect()->route('login'); // Ensure 'login' route exists
        }

        $usertype = Auth::user()->usertype; // Get the user type
    
        if ($usertype == 'user') {
            return redirect()->route('dashboard'); // Redirect to user dashboard
        } 
        elseif ($usertype == 'admin') {
            return view('admin.adminhome');
        }
         else {
            return redirect()->back();
        }
    }
}
