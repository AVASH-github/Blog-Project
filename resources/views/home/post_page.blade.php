<!DOCTYPE html>
<html lang="en">
   <head>
   <base href="/public">
   @include('home.homecss')
     <style>
    .post_title{
        font-size: 50px;
        font-weight: bold;
        color: white;
        padding:10px;
        color: black;
        
    }
    </style>
      </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
  
      </div>
       <div class="page-content">

      
  <div class="m-8 text-center">
     <h1 class="post_title">Update Post</h1> 
    </div>
      @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div> 
        @endif
    <div> 
        <form action="{{url('update_post_data',$data->id)}}" class="max-w-2xl p-6 mx-auto bg-gray-800 rounded-lg shadow-lg" method="POST" enctype="multipart/form-data">

    @csrf
  <div class="mb-4 text-center">
        <label for="title" class="block text-lg font-semibold text-white">Post Title</label>
        <input type="text" name="title" id="title" value={{$data->title}} class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4 text-center">
        <label for="description" class="block text-lg font-semibold text-white">Post Description</label>
        <textarea name="description" id="description" class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">{{$data->description}}</textarea>
    </div>
        <div class="mb-4 text-center">
            <label for="old image" class="text-lg font-semibold text-white">Old Image</label>
            <img src="/postimage/{{$data->image}}" alt="Previous Image">
        </div>
    <div class="mb-4 text-center">
        <label for="image" class="block text-lg font-semibold text-white">Update Old Image Image</label>
        <input type="file" name="image" id="image" class="w-full p-3 mt-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <input type="submit" value="Update" class="w-full px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    
    
</form>
 </div>
      @include('home.footer')   
   </body>
</html>