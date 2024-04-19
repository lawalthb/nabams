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
          <span>Edit Candidate</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

              <!-- input text -->
              <form action="{{route('admin.candidates.update',$electionCandidate->id )}}" method="post">
      @csrf

      <div>
            <label for="ctnSelect1">Update Payment Status</label>
            <select  name="payment_status" id="payment_status" class="form-select text-white-dark" required>
                
            <option selected value="{{$electionCandidate->payment_status}}">{{$electionCandidate->payment_status}}</option>
               <option value="pending">Pending</option>
               <option value="approved">Approve</option>
            </select>
        </div>
        <div>


    <div>
            <label for="ctnSelect1">Select Session </label>
            <select  name="academic_session" id="academic_session" class="form-select text-white-dark" required>
                
                
                @foreach ($academic_sessions as $academic_session)
                <option value="{{$academic_session->id}}">{{$academic_session->session_name}}</option>
                @endforeach
            </select>
        </div>
        <div>
        
        <label for="ctnSelect1">Display Name</label>
       
        <input type="text" id="display_name" value="{{$electionCandidate->name}}" placeholder="e.g: Jagaban" name="name" class="form-input" required />
            
       
        </div>

       
        
        <button type="submit" class="btn btn-primary mt-6">Update</button>
    </form>
    
        </div>

      </div>



    </div>
    </div>
  </div>
  </div>

  

  
    </x-layout.default>