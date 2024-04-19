<x-layout.default>



  <div x-data="invoiceList" >
   
  @if(session()->has('success'))


<span class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
  <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
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
          <a href="javascript:;" class="text-primary hover:underline">Contestant</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>List of Contestant</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

        <a href="{{route('admin.contest.candidates.create')}}"><button type="button" style="border-width: 10px;" class=" btn-primary mt-6 mb-3">Add New Contestant</button></a>
       
            <select id="ctnSelect1" name="academic_session" onchange="searchBy(this)">
            <option>Select Academic Section</option>
                @foreach ($academic_sessions as $academic_session)
                <option value="{{$academic_session->id}}">{{$academic_session->session_name}}</option>
                @endforeach
            </select>
            <select id="" name="academic_session" onchange="searchByPosition(this)">
            <option>Select Position</option>
                @foreach ($positions as $position)
                <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>
        
        <table class="table-auto">
  <thead>
    <tr>
      <th>SN</th>
      <th>Academic Session</th>
      <th>Position</th>
      <th>Name</th>
      <th>Vote Link</th>
    
      <th>Votes</th>
      <th>Action</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   
    @foreach ( $ContestantCandidates as  $key =>  $ContestantCandidate )
       
   
    <tr>
    <td> {{ $key+1 }} </td> 
      <td>{{$ContestantCandidate['academicSession']['session_name']}}</td>
      <td>{{$ContestantCandidate['position']['name']}}</td>
      <td>{{$ContestantCandidate->name}}</td>
      <td>{{$ContestantCandidate->vote_link}}</td>
      
      <td>{{$ContestantCandidate->votes}}</td>
     
<td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            <button type="button" x-tooltip="Edit">

                                            <a href="{{route('admin.contest.candidates.edit', $ContestantCandidate->id )}}" title="Edit">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#1C274C" stroke-width="1.5"/>
<path d="M8 13H10.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8 9H14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8 17H9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
<path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="#1C274C" stroke-width="1.5"/>
</svg>

</a>

                                            </button>
                                            <button type="button" x-tooltip="Delete">
                                            <a href="{{route('admin.contest.candidates.delete', $ContestantCandidate->id )}}" onclick="return confirmDelete();" title="Delete Position" >
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M16 4C18.175 4.01211 19.3529 4.10856 20.1213 4.87694C21 5.75562 21 7.16983 21 9.99826V15.9983C21 18.8267 21 20.2409 20.1213 21.1196C19.2426 21.9983 17.8284 21.9983 15 21.9983H9C6.17157 21.9983 4.75736 21.9983 3.87868 21.1196C3 20.2409 3 18.8267 3 15.9983V9.99826C3 7.16983 3 5.75562 3.87868 4.87694C4.64706 4.10856 5.82497 4.01211 8 4" stroke="red" stroke-width="1.5"/>
<path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="red" stroke-width="1.5"/>
<path d="M14.5 11L9.50004 16M9.50002 11L14.5 16" stroke="red" stroke-width="1.5" stroke-linecap="round"/>
</svg>

        </a>

                                            </button>
                                        </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
        </div>

      </div>



    </div>
    </div>
  </div>
  </div>

  <script>
    function searchBy(select) {
        // Get the selected value
        var selectedValue = select.value;
//alert(selectedValue);
       
        window.location.href = "{{route('admin.candidates.index')}}?id=" + selectedValue; // Replace "/your-route/" with the actual route
    }

    function searchByPosition(select) {
        // Get the selected value
        var selectedValue = select.value;
//alert(selectedValue);
       
        window.location.href = "{{route('admin.candidates.index')}}?position_id=" + selectedValue; // Replace "/your-route/" with the actual route
    }
</script>

  
    </x-layout.default>



    