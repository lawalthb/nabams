<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Benefit Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Benefit</h5><br />
                    
                </div>
                <code style="color:red">NB.: <a href="javascript:;" >Image is compursory for first benefit</a></code>
                <div class="mb-5">
                    @foreach ($benefits as $key => $benefit)
                        
                   
                <form method="post" action="{{route('admin.website.update.benefit')}}" enctype="multipart/form-data">
            @csrf
            <label>Icon ({{$key+1}}):</label>
                        
                        <input type="text" class="form-control  mb-5" name="icon"  value="{{$benefit->icon}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$benefit->id}}" >
                        <br />
                        <label>Title:</label>
                        <input type="text" name="title" class="form-input" value="{{$benefit->title}}" />
                        <br />
                        <label>Text:</label>
                        <input type="text" name="text" class="form-input" value="{{$benefit->text}}" />
                        <br />
                        @if ($key == 0)
                        <label>Image:</label>
                        <input type="file" name="image" class="form-input"  />
                        @endif
                        
                        <br />
                        <label>Position:</label>
                        <input type="number" name="position" class="form-input" value="{{$benefit->position}}" />
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

