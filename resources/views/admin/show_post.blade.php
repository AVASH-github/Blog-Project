<!DOCTYPE html>
<html>
<head>
   @include('admin.css')
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body class="text-white bg-gray-900">
   @include('admin.header')

   <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation -->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end -->

      <div class="p-2 p-10 page-content">
      @if(session()->has('message'))

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div> 
        @endif
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
                <th class="px-4 py-2 text-center border border-gray-600">Action</th>
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

                <td class="px-4 py-2 mr-2 text-center border border-gray-600">
                  <a href="{{ url('edit_page', $post->id) }}" 
   class="px-4 py-2 m-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
   Edit
</a>

                  <a href="{{ url('delete_post', $post->id) }}" 
   class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300"
   onclick="confirmation(event)">
   Delete
</a>
  
                </td>
                
            </tr>
            @endforeach
        </tbody>
                </table>
            </div>

      </div >

      </div>

     @include('admin.footer')


    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are You Sure To Delete This Post?",
            text: "You will not be able to revert this!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
</body>
</html>
