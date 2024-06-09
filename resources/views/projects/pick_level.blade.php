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
          <span>Pick Level</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

              <!-- input text --> 
    <form action="{{route('admin.project.picked_level')}}" target="_blank" method="post">
      @csrf
   
        <div>
        <label for="ctnSelect1">Select Level</label>
       
        <select name="level" class="form-input" required >
          <option value="ND 2">ND 2</option>
          <option value="HND 2">HND 2</option>
        </select>
        </div>

        <button type="submit" name="pick" class="btn btn-primary m-6 ">Submit and pick topic for students </button>
    </form>
    
        </div>

      </div>



      
<br />
<br />
<br />
   
    </div>

    <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

              <!-- input text --> 
    <form action="{{route('admin.project.set_level')}}" target="_blank" method="post">
      @csrf
   
        <div>
        <label for="ctnSelect1">Select Level</label>
       
        <select name="level" class="form-input" required >
          <option value="ND 2">ND 2</option>
          <option value="HND 2">HND 2</option>
        </select>
        </div>

        <button type="submit" name="set" class="btn btn-primary m-6 ">Submit and Set Topic for students </button>
    </form>
    
        </div>

      </div>



      
<br />
<br />
<br />
   
    </div>
  </div>
  </div>

  

  
    </x-layout.default>