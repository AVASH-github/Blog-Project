<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Posts </h1>
            <p class="services_text">
            <div class="services_section_2">
               <div class="row">
               
             @foreach ($post as $post )
                  <div class="col-md-4 ">
                     <div><img src="/postimage/{{$post->image}}" class="services_img" ></div>
                     
                     <h4 class="font-bold text-center">{{$post->title}}</h4>
                     
                     <p class="text-right">Post by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="{{url('post_details',$post->id)}}" class="mb-5">Read More</a></div>
                  </div>
      
                    @endforeach
               </div>
            </div>
         </div>
      </div>