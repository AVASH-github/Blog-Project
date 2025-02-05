<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

        <style>
    .post_title{
        font-size: 50px;
        font-weight: bold;
        color: white;
        padding:10px;
        
    }
            
        </style>
  
  </head>
  <body>
   @include('admin.header')
   
    <div class="d-flex align-items-stretch">
    
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
 <div class="page-content">

        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div> 
        @endif

    <div class="m-8 text-center">
     <h1 class="post_title">
    Add Post
</h1>
    </div>
  

        <div>
       
    <form action="{{url('add_post')}}" class="max-w-2xl p-6 mx-auto bg-gray-800 rounded-lg shadow-lg" method="POST" enctype="multipart/form-data">

    @csrf
  <div class="mb-4 text-center">
        <label for="title" class="block text-lg font-semibold text-white">Post Title</label>
        <input type="text" name="title" id="title" class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4 text-center">
        <label for="description" class="block text-lg font-semibold text-white">Post Description</label>
        <textarea name="description" id="description" class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
    </div>

    <div class="mb-4 text-center">
        <label for="image" class="block text-lg font-semibold text-white">Add Image</label>
        <input type="file" name="image" id="image" class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <input type="submit" class="w-full px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    
    
</form>
 </div>
       <div class="mb-5">
       
       </div>
       @include('admin.footer')
  </body>
</html>