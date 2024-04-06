<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Header Section</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
            <!-- type=text -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Update Logo and Site name</h5>
                    
                </div>
                <div class="mb-5">
                <form method="post" action="{{route('admin.website.update.header')}}" enctype="multipart/form-data">
            @csrf
            <label>Logo:</label>
                        <input type="file" name="logo"  class="form-input mb-5"  />
                        <input type="hidden" class="form-control " name="old_logo" value="{{$header->logo}}" >
                        <br />
                        <label>Site Name:</label>
                        <input type="text" name="site_name" class="form-input" value="{{$header->site_name}}" />
                        <button type="submit" class="btn btn-primary mt-6">Update</button>


                    </form>
                </div>
                
            </div>

           
          
            
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    </div>
</x-layout.default>

