<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    public function index()
    {   
        if (Auth::check()) { // Check if the user is authenticated
            $usertype = Auth::user()->usertype; // Get the user type
    
            if ($usertype === 'admin') {
                $post = Post::where('post_status','=','active')->get(); // Fetch posts for admin
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
        $post = Post::where('post_status','=','active')->get();
        return view('home.homepage', compact('post'));
    }


    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details',compact('post'));
    }


    public function create_post()
    {
            return view('home.create_post');
    }

    public function user_post(Request $request)
    {

        $user=Auth::user() ;
        $userid = $user->id;
        $user_name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->name = $user_name;
        $post->usertype =$usertype;

        $post->post_status = 'pending';

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage',$imagename);
          
            $post->image = $imagename;
        }
     

        $post->save();

        Alert::success('Congrats','You have Added the data Successfully');

        return redirect()->back()->with('message','Post Added Successfully');

    }

    public function my_post()
    {
        $user = Auth::user();
        $userid = $user->id;
    
        $data = Post::where('user_id', $userid)->get(); // ✅ Corrected
        return view('home.my_post', compact('data'));
    }
    
    public function my_post_del($id)
    {
            $data = Post::find($id);

            $data->delete();

            return redirect()->back()->with('message','Post Deleted Successfully');
    }   
    
    public function post_update_page($id)
    {
        $data = Post::find($id);


        return view('home.post_page',compact('data'));
    }
    public function update_post_data(Request $request,$id)
    {
            $data = Post::find($id);

           
            $data->title=$request->title;
            $data->description=$request->description;

            $image=$request->image;
            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();

                $request->image->move('postimage',$imagename);
              
                $data->image = $imagename; 
            }

            $data->save();

            return redirect()->back()->with('message','Post Updated Successfully');
            


    }
}
