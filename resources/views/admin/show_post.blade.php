<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>

<body class="flex flex-col min-h-screen text-white bg-gray-900">

    @include('admin.header')
<div class="d-flex align-items-stretch">
        <!-- Sidebar -->
        @include('admin.sidebar')
 <div class="page-content">

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @if(session()->has('message'))
                <div class="p-3 mb-4 text-white bg-purple-500 rounded-md">
                    <button type="button" class="float-right font-bold text-white" onclick="this.parentElement.style.display='none'">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <h1 class="py-4 text-2xl font-bold text-center">All Posts</h1>

            <!-- Table -->
            <table class="w-full border border-gray-600 shadow-lg">
                <thead class="text-gray-200 bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 border border-gray-600">Post Title</th>
                        <th class="px-4 py-2 border border-gray-600">Description</th>
                        <th class="px-4 py-2 border border-gray-600">Post By</th>
                        <th class="px-4 py-2 border border-gray-600">Post Status</th>
                        <th class="px-4 py-2 border border-gray-600">User Type</th>
                        <th class="px-4 py-2 border border-gray-600">Image</th>
                        <th class="px-4 py-2 border border-gray-600">Action</th>
                        <th class="px-4 py-2 border border-gray-600">Accept/Reject</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($post as $post)
                        <tr class="transition duration-300 bg-gray-800 hover:bg-gray-700">
                            <td class="px-4 py-2 text-center border border-gray-600">{{ $post->title }}</td>
                            <td class="px-4 py-2 text-center border border-gray-600">{{ $post->description }}</td>
                            <td class="px-4 py-2 text-center border border-gray-600">{{ $post->name }}</td>
                            <td class="px-4 py-2 text-center border border-gray-600">{{ $post->post_status }}</td>
                            <td class="px-4 py-2 text-center border border-gray-600">{{ $post->usertype }}</td>
                            <td class="px-4 py-2 text-center border border-gray-600">
                                <img src="postimage/{{ $post->image }}" 
                                     alt="Post Image" 
                                     class="w-24 h-16 mx-auto border border-gray-500 rounded-md">
                            </td>
                            <td class="px-4 py-2 text-center border border-gray-600">
                                <a href="{{ url('edit_page', $post->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Edit</a>
                                <a href="{{ url('delete_post', $post->id) }}" 
                                   class="px-4 py-2 m-2 text-white bg-red-600 rounded-md hover:bg-red-700" >
                                   Delete</a>
                            </td>
                            <td class="px-4 py-2 text-center border border-gray-600">
                                <a href="{{url('accept_post', $post->id)}}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600" onclick="return confirm('Are you Sure To Accept?')">Accept</a>
                                <a href="{{url('reject_post',$post->id)}}" class="px-4 py-2 m-2 text-white bg-yellow-600 rounded-md hover:bg-yellow-700" onclick="return confirm('Are you Sure?')">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- Content End -->
    </div> <!-- Sidebar and Content end -->
</div>
    <!-- Footer -->
    <footer class="py-3 text-center text-white bg-gray-800">
        © 2025 Your Website. All Rights Reserved.
    </footer>

    <script>
       
    </script>

</body>
</html>
