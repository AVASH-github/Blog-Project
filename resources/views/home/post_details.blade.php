<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.homecss')
</head>
<body class="text-white">

    <!-- Header Section -->
    <div class="header_section">
        @include('home.header')
    </div>

    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-2xl p-6 text-center rounded-lg shadow-lg" >
            
            <!-- Image -->
            <div class="flex justify-center">
                <img src="/postimage/{{$post->image}}" alt="Post Image" 
                     class="w-[400px] h-[300px] object-contain rounded-lg shadow-md">
            </div>

            <!-- Title -->
            <h2 class="mt-4 text-2xl font-bold">{{$post->title}}</h2>

            <!-- Description -->
            <p class="mt-2 text-gray-500">{{$post->description}}</p>

            <!-- Author -->
            <p class="mt-4 text-sm text-gray-400">Post by <b class="uppercase">{{$post->name}}</b></p>
           
        </div>
    </div>

    @include('home.footer')   

</body>
</html>
