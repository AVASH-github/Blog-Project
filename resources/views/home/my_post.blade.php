<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.homecss')
</head>
<body>
    <!-- Header section -->
    <div class="header_section">
        @include('home.header')
    </div>

    <div class="container">
        <h1 class="text-center my-4">Blog Posts</h1>

        @if($data->count() > 0)  <!-- Check if data is not empty -->
            <div class="row">
                @foreach ($data as $post) 
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/postimage/{{$post->image}}" class="card-img-top" alt="Post Image">
                            <div class="card-body">
                                <h4 class="card-title">{{$post->title}}</h4>
                                <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                               
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
