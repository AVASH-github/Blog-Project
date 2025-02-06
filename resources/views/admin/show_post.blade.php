<!DOCTYPE html>
<html>
<head>
   @include('admin.css')
</head>
<body class="text-white bg-gray-900">
   @include('admin.header')

   <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation -->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end -->

      <div class="p-2 p-10 page-content">
         <h1 style="font-size:40px; color: white; font-weight: bold;text-align:center; padding: 10px;">All Posts</h1>

     <div class="overflow-x-auto">
    <table class="w-full border border-collapse border-gray-600 shadow-lg">
        <thead class="text-gray-200 bg-gray-900">
            <tr>
                <th class="px-4 py-2 text-center border border-gray-600">Post Title</th>
                <th class="px-4 py-2 text-center border border-gray-600">Description</th>
                <th class="px-4 py-2 text-center border border-gray-600">Post By</th>
                <th class="px-4 py-2 text-center border border-gray-600">Post Status</th>
                <th class="px-4 py-2 text-center border border-gray-600">User Type</th>
                <th class="px-4 py-2 text-center border border-gray-600">Image</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-700">
            @foreach ($post as $post)
            <tr class="text-gray-200 transition duration-300 bg-gray-800 hover:bg-gray-700">
                <td class="px-4 py-2 text-center border border-gray-600">{{ $post->title }}</td>
                <td class="px-4 py-2 text-center border border-gray-600">{{ $post->description }}</td>
                <td class="px-4 py-2 text-center border border-gray-600">{{ $post->name }}</td>
                <td class="px-4 py-2 text-center border border-gray-600">{{ $post->post_status }}</td>
                <td class="px-4 py-2 text-center border border-gray-600">{{ $post->usertype }}</td>
                <td class="px-4 py-2 mr-2 text-center border border-gray-600">
                    <img src="postimage/{{ $post->image }}" 
                         alt="Post Image" 
                         class="object-cover w-24 h-16 mx-auto border border-gray-500 rounded-md shadow-md mr">
                </td>
            </tr>
            @endforeach
        </tbody>
                </table>
            </div>

      </div >

      </div>

     @include('admin.footer')
</body>
</html>
