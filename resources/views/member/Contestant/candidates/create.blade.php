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
          <span>Add Candidate</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

              <!-- input text -->
    <form action="{{route('admin.contest.candidates.store')}}" method="post">
      @csrf
    <div>
            <label for="ctnSelect1">Select Session </label>
            <select  name="academic_session" id="academic_session" class="form-select text-white-dark" required>
                
                
                @foreach ($academic_sessions as $academic_session)
                <option value="{{$academic_session->id}}">{{$academic_session->session_name}}</option>
                @endforeach
            </select>
        </div>
        <div>
        <label for="ctnSelect1">Position name</label>
        <select  name="position_id" id="position_id" class="form-select text-white-dark" required>
              <option>You need to first select session</option>
            </select>
       
        </div>


        <div>
        <label for="ctnSelect1">Select Candidate</label>
        <select  name="user_id" id="user_id" class="form-select text-white-dark" required>
              <option>Pick Apsirer</option>
              @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->lastname}} {{$user->firstname}}</option>
                @endforeach
            </select>
       
        </div>

        <div>
        <label for="ctnSelect1">Display Name</label>
       
        <input type="text" id="display_name" placeholder="e.g: Jagaban" name="name" class="form-input" required />
            
       
        </div>

       
        
        <button type="submit" class="btn btn-primary mt-6">Submit</button>
    </form>
    
        </div>

      </div>



    </div>
    </div>
  </div>
  </div>
  <script>
   
    var academic_session = document.getElementById('academic_session');
    var position_id = document.getElementById('position_id');

    // Function to populate positions
    function fillPosition() {
        
        position_id.innerHTML = '';

        var id = academic_session.value;

       
        fetch('/admin/contest/candidates/getPositionBySession?id=' + id)
            .then(response => response.json())
            .then(data => {
               
                data.forEach(function(positions) {
                    var option = document.createElement('option');
                    option.value = positions.id;
                    option.textContent = positions.name;
                    position_id.appendChild(option);
                });
            });
    }

    fillPosition();
    academic_session.addEventListener('change', function() {
        fillPosition();
    });
</script>

  
    </x-layout.default>