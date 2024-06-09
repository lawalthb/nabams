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
          <a href="javascript:;" class="text-primary hover:underline">Project</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Approved Topic</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5" style="margin-bottom: 50px;">

        <b>Approved Topic:
             @if (is_null($approved_topic))
                <p>No approved topic found.</p>
            @else
                @if($approved_topic->approve_num == 1)
                {{$approved_topic->topic1}}
                @elseif($approved_topic->approve_num == 2)
                {{$approved_topic->topic2}}
                @elseif($approved_topic->approve_num == 3)
                {{$approved_topic->topic3}}
                @elseif($approved_topic->approve_num == 4)
                {{$approved_topic->supervisor_topic}}
                @else
                No approved topic yet
                @endif
            @endif</b><br />

            @if (is_null($supervisor_name))
                <p>No Supervisor Yet.</p>
            @else
            <b>Supervisor Name: {{$supervisor_name->supervisor->name}}</b><br />
        <b>Supervisor Email: {{$supervisor_name->supervisor->email}}</b><br />
        <b>Supervisor Phone: {{$supervisor_name->supervisor->phone}}</b>
            @endif

        
    
    
        </div>

      </div>
<br />
<br />
<br />
   
    </div>
  </div>
  </div>

  
<div style="margin-bottom: 200px;"></div>
  
    </x-layout.default>