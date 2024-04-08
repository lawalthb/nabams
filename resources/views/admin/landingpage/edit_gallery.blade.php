<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Gallery Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Gallery</h5><br />
                    
                </div>
              
                <div class="mb-5">
                    @foreach ($galleries as $key => $gallery)
                        
                   
                <form method="post" action="{{route('admin.website.update.gallery')}}" enctype="multipart/form-data">
            @csrf
            
            <label>Photo  ({{$key+1}}):</label>
                        <img src="{{asset($gallery->images)}}"  width="100px" height="100px">
                        
                       
                        <input type="file" name="image" class="form-input"  />
                        @error('image')
                    <p class="error_msg">{{ $message }}</p>
                    @enderror
                        <input type="hidden" class="form-control " name="old_image" value="{{$gallery->images}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$gallery->id}}" >
                      
                        
                        <br />
                        <label>Position:</label>
                        <input type="number" name="position" class="form-input" value="{{$gallery->position}}" />
                        <button type="submit" class="btn btn-primary mt-6">Update {{$key+1}}</button>


                    </form>
                    <div class="mt-5">
                        <hr />
                    </div>
                    @endforeach
                </div>
                
            </div>

           
          
            
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    </div>
</x-layout.default>

