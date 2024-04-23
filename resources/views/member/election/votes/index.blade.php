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
          <span>Votes</span>
        </li>


      </ul>
      <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
      <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
        <div class="px-5">

          
        
          <!-- list candidate and votes @foreach($positions as $position)
    <h2>{{ $position->name }}</h2>
    <ul>
        @foreach($position->candidates as $candidate)
            <li>
                {{ $candidate->name }} - Votes: {{ $candidate->votes }}
            </li>
        @endforeach
    </ul>
@endforeach -->

<!-- //start position here -->
@foreach($positions as $position)
@php $count = 0; @endphp
<h3 class="font-bold text-xl md:text-3xl mb-5">{{ $position->name }}</h3>
<form class="vote-form" method="POST" action="{{ route('member.election.vote') }}">
        @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            <!-- start one cand    -->
           
        <input type="hidden" name="position_id" value="{{ $position->id }}">
        @foreach($position->candidates as $candidate)
            @php
          
              
                      $candidate->id;
                      $user_id = Auth()->user()->id;
                      $position->id;
                      $candidate->user_id;
                      $checkVote = App\Models\ElectionVotes::where('user_id', $user_id)->where('position_id',   $position->id)->where('candidate_id', $candidate->id)->first();
     
                      $candidate_details  = App\Models\User::where('id', $candidate->user_id)->first();
     
      
            @endphp
            <div
                    class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md bg-white dark:bg-[#0e1726] p-5 shadow-[0px_0px_2px_0px_rgba(145,158,171,0.20),_0px_12px_24px_-4px_rgba(145,158,171,0.12)]">
                    <div
                        class="rounded-md overflow-hidden mb-5 shadow-[0_6px_10px_0_rgba(0,0,0,0.14),_0_1px_18px_0_rgba(0,0,0,0.12),_0_3px_5px_-1px_rgba(0,0,0,0.20)]">
                        <img src="{{asset($candidate_details->image)}}" alt="..." />
                    </div>
                    <h5 class="text-xl mb-5"> {{ $candidate->name }} 
                      @php
                       
                            if($checkVote){
                              if( $candidate->id == $checkVote->candidate_id ){ $count = 1; echo '(Voted)';}
                            }    else{
                              echo '';}            
                                      
                      @endphp</h5>
                    <div class="flex">
                        <div class="rounded-full overflow-hidden ltr:mr-4 rtl:ml-4">
                        <input type="radio" name="candidate_id" value="{{ $candidate->id }}">
                        </div>
                        <div class="flex-1">
                            <h4>as {{ $position->name }}</h4>
                            
                        </div>
                    </div>
                  </div>
                 
                
              <!-- end one canditate -->
            
              @endforeach  
              @if ($count == 0)
                <button class="btn vote-btn" type="submit" style="border: solid blue 2px; height:50px;  ">Vote</button>
          
              @endif
              </form>
         
                
                
            </div>
            
        @php  $count =0 ; @endphp
        </div>
       
    <hr />
@endforeach





<script>
document.addEventListener('DOMContentLoaded', function() {
    var voteForms = document.querySelectorAll('.vote-form');
    voteForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var submitButton = form.querySelector('.vote-btn');
            submitButton.disabled = true; // Disable the button to prevent multiple submissions
            // Optional: Add loading spinner or text to indicate processing
            // Example: submitButton.innerHTML = 'Processing...';
            // Submit the form using fetch or XMLHttpRequest
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            }).then(function(response) {
                // Handle response
                if (response.ok) {
                    // Optional: Show success message or redirect to another page
                } else {
                    // Optional: Show error message or handle error scenario
                }
            }).catch(function(error) {
                // Handle error scenario
            }).finally(function() {
                submitButton.style.display = 'none'; // Hide the button after submission
            });
        });
    });
});
</script>



    
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
       
        window.location.href = "{{route('admin.positions.index')}}?id=" + selectedValue; // Replace "/your-route/" with the actual route
    }
</script>

  
    </x-layout.default>



    