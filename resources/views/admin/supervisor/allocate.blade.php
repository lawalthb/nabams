<x-layout.default>



  <div x-data="invoiceList" >
   
        @if(session()->has('success'))


              <span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
                <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

                </button>
              </span>



        @endif

        @if(session()->has('error'))


<span class="flex items-center p-3.5 rounded text-danger bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Error!</strong>{{ session('error') }}</span>
  <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

  </button>
</span>



@endif


            @if ($errors->any())
                <div >
       
                       @foreach ($errors->all() as $error)
                          <span class="flex items-center p-3.5 rounded text-danger bg-primary-light dark:bg-primary-dark-light">
                          <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Error!</strong>{{ $error }}</span>
                          <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

                        </button>
              
                       @endforeach
        
                </div>
          @endif

    <div x-data="sales">
                <ul class="flex space-x-4 rtl:space-x-reverse">
                  <li>
                    <a href="javascript:;" class="text-primary hover:underline">Supervisor Allocation</a>
                  </li>
                  <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Assign Supervisor</span>
                  </li>


                </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
              <div class="px-5">

                    <!-- input text -->
                  <form action="{{route('admin.lecturers.allocate')}}" method="get">
                      @csrf
                        <div>
                                <label for="ctnSelect1">Select Supervisor </label>
                                <select id="ctnSelect1" name="lecturer_id" class="form-select text-white-dark" required>
                                    
                                @foreach ( $lecturers as  $lecturer)
                                    <option value="{{$lecturer->id}}">{{$lecturer->name}} </option>
                                @endforeach
                                  
                                </select>
                          </div>
                          <div>
                                <label for="ctnSelect1">Level</label>
                                <select id="ctnSelect1" name="level" class="form-select text-white-dark" required>
                                   
                                    <option value="ND 1">ND 1</option>
                                        <option value="ND 2">ND 2</option>
                                        <option value="ND 3">ND 3</option>
                                        <option value="HND 1">HND 1</option>
                                        <option value="HND 2">HND 2</option>
                                        <option value="HND 3">HND 3</option>
                                      
                                    </select>
                            </div>

                                  <button type="submit" class="btn btn-primary m-6 ">Next</button>
                      </form>
    
              </div>

          </div>
      

        </div>
      </div>
    </div>
  
        <div style="margin-top:5px">
          @if(isset($members))
              <div class="panel lg:col-span-2"  >
                          <div class="flex items-center justify-between mb-5">
                              <h5 class="font-semibold text-lg dark:text-white-light">All Student in @php echo $_GET['level'] @endphp
                                <br > Supervisor name: {{$supervisor->name }}
                              </h5>
                              
                          </div>
                  <div class="mb-5" >
                    <form action="{{route('admin.allocate.list_student')}}" method="post">
                        @csrf
                        <input type="hidden" name="supervisor_id" value="{{$supervisor->id}}" >
                        <table>
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Check</th>
                                    
                                    <th>Matric No.</th>
                                    <th>Fullname</th>
                                    <th>Level</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                    @foreach ( $members as $key=>$member )
                                          <tr>
                                              <td> {{$members->firstItem() + $key}}</td>
                                              <td> 
                                              <input type='checkbox' name='members[]' value="{{$member->id}}" class='form-checkbox' />
                                              @php 
                                              $memberID = $member->id;
                                              $supervisor_id = App\Models\SupervisorUser::where('user_id',$memberID )->latest()->value('supervisor_id');
                                              $supervisor_name = App\Models\Supervisor::where('id',$supervisor_id )->value('name');
                                               
                                               echo  $supervisor_name ;
                                                
                                              @endphp
                                            </td>
                                            
                                              <td> {{$member->matno}}</td>
                                              <td> {{$member->lastname}} {{$member->firstname}}</td>
                                              <td> {{$member->level}}</td>
                                                
                                          </tr>
                                      @endforeach
                                </tbody>
                          </table>
                        <button type="submit" class="btn btn-primary py-2.5">Allocate</button>
                    </form>
                  </div>
              
              </div>
            @endif
          </div>
  </div>
 
  
    </x-layout.default>