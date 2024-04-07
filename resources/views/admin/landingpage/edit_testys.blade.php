<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Testimonials Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Testimony</h5><br />
                    
                </div>
              
                <div class="mb-5">
                    @foreach ($testys as $key => $testy)
                        
                   
                <form method="post" action="{{route('admin.website.update.testy')}}" enctype="multipart/form-data">
            @csrf
            <label>Name ({{$key+1}}):</label>
                        
                        <input type="text" class="form-input  mb-5" name="name"   value="{{$testy->name}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$testy->id}}" >
                        
                        <br />
                        <label>Testimony:</label>
                        <textarea name="testimony" id=""  class="form-input  mb-5 " cols="50" rows="10">{{$testy->testimony}}</textarea>
                       
                    
                        <label>Picture:</label>
                        <input type="file" name="image" class="form-input"  />
                        <input type="hidden" class="form-control " name="old_image" value="{{$testy->image}}" >
                      
                        
                        <br />
                        <label>Position:</label>
                        <input type="number" name="position" class="form-input" value="{{$testy->position}}" />
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

