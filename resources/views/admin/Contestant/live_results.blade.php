<x-layout.default>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('87892ed076b91483ee2a', {
    cluster: 'mt1'
  });
  var channel = pusher.subscribe('contest');
  channel.bind('pusher:subscription_succeeded', function(e) {
     //alert('successfully subscribed!');
  });
  channel.bind("VoteCasted", function(e) {
    live_content(e.latest);
    showMessage("Your message here!");
  });


  


</script>
<style>
#messageBox {
  position: fixed;
  top: 70px;
  left: 50%;
  transform: translateX(-50%);
  background-color: yellow;
  padding: 10px 20px;
  border-radius: 5px;
  border: 1px solid red;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
}

#messageBox.show {
  opacity: 1;
}

    </style>
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="analytics">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Contest</a>
            </li>
            <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
                <span onclick="live_content(5)">Live Results </span>
            </li>
        </ul>
        <div id="messageBox">lawal is here</div>
        <div class="pt-5" id="live_content">
            

            <div class="grid sm:grid-cols-3 xl:grid-cols-5 gap-6 mb-6" >
            @foreach($categories as $category)
                <!-- start -->
                <div class="panel h-full sm:col-span-2 xl:col-span-2">
                    <div class="flex items-start justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">{{ $category->name }}</h5>
                    </div>
                    <!-- start contestant -->
                    
                    @php
                    $candidates = json_decode($category->candidates, true);

// Initialize total votes counter
$totalVotes = 0;

// Iterate over each candidate and sum up their votes
foreach ($candidates as $candidate) {
    $totalVotes += $candidate['votes'];
}

echo $total_vote =  $totalVotes;

@endphp
                    @foreach($category->candidates as $candidate)
                    <div class="flex flex-col space-y-5">
                        <div class="flex items-center">
                            <div class="w-9 h-9">
                                <div
                                    class="bg-primary/10 text-primary rounded-xl w-9 h-9 flex justify-center items-center dark:bg-primary dark:text-white-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="4">
                                        </circle>
                                        <line opacity="0.5" x1="21.17" y1="8" x2="12"
                                            y2="8"></line>
                                        <line opacity="0.5" x1="3.95" y1="6.06" x2="8.54"
                                            y2="14"></line>
                                        <line opacity="0.5" x1="10.88" y1="21.94" x2="15.46"
                                            y2="14"></line>
                                    </svg>
                                </div>
                            </div>
                            @php  
                            $hexColor1 = 'from-[#4361ee] to-[#805dca]';
                            $hexColor2 = 'from-[#009ffd] to-[#2a2a72]';
                            $hexColor3 = 'from-[#a71d31] to-[#3f0d12]';
                            $hexColor4 = 'from-[#fe5f75] to-[#fc9842]';
                            $hexColor5 = 'from-[#3d38e1] to-[#1e9afe]';
                            
                            $arrayColours = [$hexColor1,  $hexColor2, $hexColor3, $hexColor4, $hexColor5 ];

                            $randomColorIndex = array_rand($arrayColours);
                            $randomColor = $arrayColours[$randomColorIndex]; 
                             $perc = ($candidate->votes/$total_vote)*100 ;
                            $percent = number_format($perc,0);
                            @endphp
                            <div class="px-3 flex-initial w-full">
                                <div class="w-summary-info flex justify-between font-semibold text-white-dark mb-1">
                                    <h6>{{$candidate->name}} ({{$candidate->votes}})</h6>
                                    <p class="ltr:ml-auto rtl:mr-auto text-xs">{{$percent}}%</p>
                                </div>
                                <div>
                                    <div
                                        class="w-full rounded-full h-5 p-1 bg-dark-light overflow-hidden shadow-3xl dark:bg-dark-light/10 dark:shadow-none">
                                        <div class="bg-gradient-to-r {{$randomColor}} w-full h-full rounded-full relative before:absolute before:inset-y-0 ltr:before:right-0.5 rtl:before:left-0.5 before:bg-white before:w-2 before:h-2 before:rounded-full before:m-auto"
                                            style="width: {{$percent}}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
                    </div>
                    <!-- end contestant -->
                    @endforeach 
                </div>
                <!-- end -->
                @endforeach
           
            </div>

        </div>
    </div>
   

   
    <script>
        function live_content(int){
            console.log('lawal is in console');
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("live_content").innerHTML=this.responseText;
                    }
                }
                xmlhttp.open("GET","live_content?vote="+int,true);
                xmlhttp.send();
        }
   

        function showMessage(message) {
  var messageBox = document.getElementById("messageBox");
  messageBox.innerHTML = message;
  messageBox.classList.add("show");

  setTimeout(function() {
    messageBox.classList.remove("show");
  }, 8000); // 8 seconds
}

    </script>

</x-layout.default>
