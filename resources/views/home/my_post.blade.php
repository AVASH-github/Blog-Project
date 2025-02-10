<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.homecss')
    <style>
    
          .post_title{
        font-size: 50px;
        font-weight: bold;
        color: black;
        padding:20px;
     
    }
    
    </style>
</head>
<body>
    <!-- Header section -->
    <div class="header_section">
        @include('home.header')
    </div>

    <!-- Success Message (Appears Below Header and Above Posts) -->


    <div class="container">
      
        <h1 class="post_title text-">Blog Posts</h1>
    @if(session()->has('message'))
            <div class="alert alert-success text-center">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        @if($data->count() > 0)  <!-- Check if data is not empty -->
            <div class="row">
                @foreach ($data as $post) 
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/postimage/{{$post->image}}" class="card-img-top" alt="Post Image">
                            <div class="card-body">
                                <h4 class="card-title">{{$post->title}}</h4>
                                <p class="card-text">{{ Str::limit($post->description, 100) }}</p>

                                <!-- Fixed Delete Button with Confirmation -->
                                <a href="{{ url('my_post_del', $post->id) }}" class="btn btn-danger mt-3"
                                   onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">No blog posts available.</p>
        @endif
    </div>

    <!-- Footer -->
    @include('home.footer')
</body>
</html>
