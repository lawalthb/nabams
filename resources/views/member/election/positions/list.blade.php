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
          <a href="javascript:;" class="text-primary hover:underline">Election</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>List of Positions</span>
        </li>


      </ul>
     
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]" style="overflow: auto;">
        <div class="px-5">

        <a href="{{route('admin.positions.create')}}"><button type="button" style="border-width: 10px;" class=" btn-primary mt-6 mb-3">Add New</button></a>
       
            <select id="ctnSelect1" name="academic_session" onchange="searchBy(this)">
            <option>Select Academic Section</option>
                @foreach ($academic_sessions as $academic_session)
                <option value="{{$academic_session->id}}">{{$academic_session->session_name}}</option>
                @endforeach
            </select>
        
        <table class="table-auto">
  <thead>
    <tr>
      <th>SN</th>
      <th>Academic Session</th>
      <th>Position</th>
      <th>Form Amount</th>
      <th>Buy form</th>
    </tr>
  </thead>
  <tbody>
   
    @foreach ( $electionPositions as  $key =>  $electionPosition )
        
   
    <tr>
    <td> {{ $key+1 }} </td> 
      <td>{{$electionPosition['academicSession']['session_name']}}</td>
      <td>{{$electionPosition->name}}</td>
      <td>₦{{number_format($electionPosition->form_amt)}}</td>
      <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            <button type="button" x-tooltip="Buy Form">

                                            <a href="{{route('member.positions.buyform', $electionPosition->id )}}" onclick="return confirmBuyform();" >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 11C2 8.17157 2 6.75736 2.87868 5.87868C3.75736 5 5.17157 5 8 5H13C15.8284 5 17.2426 5 18.1213 5.87868C19 6.75736 19 8.17157 19 11C19 13.8284 19 15.2426 18.1213 16.1213C17.2426 17 15.8284 17 13 17H8C5.17157 17 3.75736 17 2.87868 16.1213C2 15.2426 2 13.8284 2 11Z" stroke="#1C274C" stroke-width="1.5"/>
<path d="M19.0001 8.07617C19.9751 8.17208 20.6315 8.38885 21.1214 8.87873C22.0001 9.75741 22.0001 11.1716 22.0001 14.0001C22.0001 16.8285 22.0001 18.2427 21.1214 19.1214C20.2427 20.0001 18.8285 20.0001 16.0001 20.0001H11.0001C8.17163 20.0001 6.75742 20.0001 5.87874 19.1214C5.38884 18.6315 5.17208 17.9751 5.07617 17" stroke="#1C274C" stroke-width="1.5"/>
<path d="M13 11C13 12.3807 11.8807 13.5 10.5 13.5C9.11929 13.5 8 12.3807 8 11C8 9.61929 9.11929 8.5 10.5 8.5C11.8807 8.5 13 9.61929 13 11Z" stroke="#1C274C" stroke-width="1.5"/>
<path d="M16 13L16 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
<path d="M5 13L5 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
</svg>


</a>
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

  <script>
    function searchBy(select) {
        // Get the selected value
        var selectedValue = select.value;
//alert(selectedValue);
       
        window.location.href = "{{route('admin.positions.index')}}?id=" + selectedValue; // Replace "/your-route/" with the actual route
    }
</script>

  
    </x-layout.default>