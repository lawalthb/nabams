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
          <a href="javascript:;" class="text-primary hover:underline">Supervisor Management</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
          <span>Edit Supervisor</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

              <!-- input text -->
    <form action="{{route('admin.lecturers.update', $user->id)}}" method="post">
      @csrf

        <div>
        <label for="ctnSelect1">Fullname*</label>
        <input type="text"  name="name" value="{{$user->name}}" class="form-input" required />
        </div>

        <div>
        <label for="ctnSelect1">Email*</label>
        <input type="email"  name="email" value="{{$user->email}}" class="form-input" required />
        </div>
        <div>
        <label for="ctnSelect1">Phone</label>
        <input type="text"  name="phone" value="{{$user->phone}}"  class="form-input"  />
        </div>
        <div>
        <label for="ctnSelect1">Other Info</label>
        <input type="text"  name="other" value="{{$user->other}}"  class="form-input"  />
        </div>
     
        <button type="submit" class="btn btn-primary m-6 ">Update</button>
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