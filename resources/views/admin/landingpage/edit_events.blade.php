<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Events Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Events</h5><br />
                    
                </div>
              
                <div class="mb-5">
                    @foreach ($events as $key => $event)
                        
                   
                <form method="post" action="{{route('admin.website.update.events')}}" enctype="multipart/form-data">
            @csrf
            <label>Title ({{$key+1}}):</label>
                        
                        <input type="text" class="form-input  mb-5" name="title"   value="{{$event->title}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$event->id}}" >
                        
                        <br />
                        <label>Short Text:</label>
                        <input type="text" name="short_text" class="form-input" value="{{$event->short_text}}" />
                        <br />
                        <label>Long Text:</label>
                        <input type="text" name="long_text" class="form-input" value="{{$event->long_text}}" />
                        <br />
                    
                        <label>Image:</label>
                        <input type="file" name="image" class="form-input"  />
                        <input type="hidden" class="form-control " name="old_image" value="{{$event->image}}" >
                      
                        
                        <br />
                        <label>Position:</label>
                        <input type="number" name="position" class="form-input" value="{{$event->position}}" />
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

