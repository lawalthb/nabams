<x-layout.default>

    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Website</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Website Settings</span>
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
            
                    <h5 class="font-semibold text-lg dark:text-white-light">Turn On or Off Section</h5><br />
                    
                </div>
                <code style="color:red">NB.: <a href="javascript:;" >Last updated by {{$websettings->user->email}}</a></code>
                <div class="mb-5">
                
                        
                   
                <form method="post" action="{{route('admin.website.setting.update')}}" enctype="multipart/form-data">
            @csrf
           
            <div class="flex" >
                <input id="switchRight" type="text" disabled placeholder="Top bar Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="top_bar" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->top_bar == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
<br />
            <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Header Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="header" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->header == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />

                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Slider Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="slider" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->slider == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />


                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Vission, Mission and Core Value - Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="vission" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->vission == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />

                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Call To Action -  Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="cta" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->cta == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />

                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="About Section " class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="about" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->about == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Count Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="count" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->count == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Our Benefits Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="benefit" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->benefit == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Resources Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="resources" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->resources == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Registration Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="registration" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->registration == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Events Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="event" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->event == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Testimonial Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="testimonial" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->testimonial == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Executives Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="excos" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->excos == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Gallery Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="gallery" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->gallery == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Pricing Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="pricing" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->pricing == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />

                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="FAQ Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="faq" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->faq == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />
                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Contact Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="contact" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->contact == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />


                       <div class="flex">
                <input id="switchRight" type="text" disabled placeholder="Footer Section" class="form-input ltr:rounded-r-none rtl:rounded-l-none" />
                <div class="bg-[#eee] flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border  ltr:border-l-0 rtl:border-r-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                    <label class="w-7 h-4 relative cursor-pointer mb-0">
                        <input type="checkbox" name="footer" class="peer absolute w-full h-full opacity-0 z-10 focus:ring-0 focus:outline-none cursor-pointer" id="custom_switch_checkbox2" @if ($websettings->footer == 'on') echo  checked  @endif />
                        <span class="rounded-full border border-[#adb5bd] bg-white peer-checked:bg-primary peer-checked:border-primary dark:bg-dark block h-full before:absolute ltr:before:left-0.5 rtl:before:right-0.5 ltr:peer-checked:before:left-3.5 rtl:peer-checked:before:right-3.5 peer-checked:before:bg-white before:bg-[#adb5bd] dark:before:bg-white-dark before:bottom-[2px] before:w-3 before:h-3 before:rounded-full before:transition-all before:duration-300"></span>
                    </label>
                </div>
            </div>
                       <br />

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

