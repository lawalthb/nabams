<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Maintenance Mode</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Basic -->
           
            <!-- type=text -->
            <div class="panel">
            @if(session()->has('success'))
<span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
  <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

  </button>
</span> @endif
                <div class="flex items-center justify-between mb-2">
            
                    <h5 class="font-semibold text-lg dark:text-white-light">Vistors  or Members  will not be able to see the landing page</h5><br />
                    
                </div>
                <code style="color:red">NB.: <a href="javascript:;" >Last updated by {{$websettings->user->email}}</a></code>
                <div class="mb-5">
                
                        
                   
                <form method="post" action="{{route('admin.website.setting.maintenance')}}" enctype="multipart/form-data">
            @csrf
           
            <div class="flex" >
                <input id="switchRight" type="text" disabled placeholder="Maintenance Mode" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="maintenance" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->maintenance == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
            <br />

            <div>
            <div>
            <label for="ctnTextarea">Information to visitor or purpose</label>
            <textarea id="ctnTextarea" rows="3" name="maintenance_text" class="form-textarea" placeholder="Information or Purpose" >{{$websettings->maintenance_text}}</textarea>
        </div>

            </div>

                       
               
                      

                        <button type="submit" class="btn btn-primary mt-6">Update </button>


                    </form>
                    <div class="mt-5">
                        <hr />
                    </div>
                  
                </div>
                
            </div>

           
          
            
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    </div>
</x-layout.default>

