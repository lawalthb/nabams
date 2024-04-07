<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Counter Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Counter</h5><br />
                    
                </div>
                <code style="color:red">NB.: <a href="https://fontawesome.com/v4/icons/" target="_blank">Get Icon text from here</a></code>
                <div class="mb-5">
                    @foreach ($counters as $key => $counter)
                        
                   
                <form method="post" action="{{route('admin.website.update.counter')}}" enctype="multipart/form-data">
            @csrf
            <label>Icon ({{$key+1}}):</label>
                        
                        <input type="text" class="form-control  mb-5" name="icon"  value="{{$counter->icon}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$counter->id}}" >
                        <br />
                        <label>Number:</label>
                        <input type="number" name="count" class="form-input" value="{{$counter->count}}" />
                        <br />
                        <label>Text:</label>
                        <input type="text" name="text" class="form-input" value="{{$counter->text}}" />

                        <br />
                        <label>Position:</label>
                        <input type="number" name="position" class="form-input" value="{{$counter->position}}" />
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

