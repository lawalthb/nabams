<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Slider Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Sliders and Texts</h5><br />
                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                </div>
                <code style="color:red">NB.: Image size should be W1920 X H1152</code>
                <div class="mb-5">
                    @foreach ($sliders as $key => $slider)
                        
                   
                <form method="post" action="{{route('admin.website.update.slider')}}" enctype="multipart/form-data">
            @csrf
            <label>Slider Image ({{$key+1}}):</label>
                        <input type="file" name="image"  class="form-input mb-5"  />
                        <input type="hidden" class="form-control " name="old_image" value="{{$slider->image}}" >
                        <input type="hidden" class="form-control " name="id" value="{{$slider->id}}" >
                        <br />
                        <label>Caption:</label>
                        <input type="text" name="caption" class="form-input" value="{{$slider->caption}}" />
                        <br />
                        <label>Text:</label>
                        <input type="text" name="text" class="form-input" value="{{$slider->text}}" />
                        <button type="submit" class="btn btn-primary mt-6">Update Slide {{$key+1}}</button>


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

