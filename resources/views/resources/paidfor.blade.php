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
          <span>My Resources</span>
        </li>


      </ul>
     
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]" style="overflow: auto;">
        <div class="px-5">
        <b style="font-size:larger;"> My Resources</b>
        <hr  ><br />
       
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
            <select class="form-select form-select-lg text-white-dark">
            <option>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
           
            </div>
           
           
            <div>
            
            </div>
            
        </div>
        
      
        <table class="table-auto">
  <thead>
    <tr>
      <th>SN</th>
    
      <th>Title</th>
      <th>Amount</th>
      <th>Payment Status</th>
     
      <th>Download</th>
      @if (auth()->user()->role =='Admin')
      <th>Action</th>
      @endif
      
    </tr>
  </thead>
  <tbody>
   
    @foreach ( $resources_paids as  $key =>  $resources_paid )
        
   
    <tr>
    <td> {{ $key+1 }} </td> 
    <td>{{$resources_paid->resources->title}}</td>
    <td>₦{{$resources_paid->amount}}</td>
    <td>{{$resources_paid->payment_status}}</td>
   
    
      
      
    
      <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                          
                                            <form method="POST" action="{{ route('resources.download', $resources_paid->id) }}">
                    @csrf
                 <input type="hidden" name="token" value="{{$resources_paid->token}}">
                                            <button  type="submit" x-tooltip="Click to download">
                                           
     Download
 </a>
 </button>
 </form>
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