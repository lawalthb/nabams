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
          <span>List of Categories</span>
        </li>


      </ul>
     
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]" style="overflow: auto;">
        <div class="px-5">

      
       
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
      <th>Category</th>
      
    
    </tr>
  </thead>
  <tbody>
   
    @foreach ( $ContestantPositions as  $key =>  $ContestantPosition )
        
   
    <tr>
    <td> {{ $key+1 }} </td> 
      <td>{{$ContestantPosition['academicSession']['session_name']}}</td>
      <td>{{$ContestantPosition->name}}</td>
     
      
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