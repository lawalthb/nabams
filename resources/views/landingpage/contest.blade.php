@extends('landingpage.layout')



@section('title', 'OGITECH NAPAS - Contest')

@section('content')

@include('landingpage.topbar')
@include('landingpage.header')






<main id="main ">


  <!-- ======= Registration Section ======= -->
  <section id="registration" class="appointment section-bg">
    <style>
      .error_msg {
        color: red;
        font-size: x-small;
      }

      .center-div {
        display: grid;
        place-items: center;
      }
    </style>
    <div class="container" data-aos="fade-up" style="overflow: auto;">

      <div class="section-title">
        <h2 style="margin-top: 100px;">Contestants List</h2>
        
      </div>
      <select class="form-select " style="width:auto;" id="ctnSelect1" name="position_id" onchange="searchBy(this)">
            <option>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
<br />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



<div class="card-body">
<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="table-responsive px-3">
                            <table class="table table-striped align-middle table-nowrap">
                                <tbody>
                                @foreach ( $contestants as $key => $contestant )
                                    <tr>
                                        <td>
                                            <div class="avatar-lg me-4">
                                            <a href="{{$contestant->vote_link}}" target="_blank" > <img src="{{$contestant->user->image}}" class="img-fluid rounded" alt="" width="100px" height="100px" ></a>
                                                
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-18"><a href="{{$contestant->vote_link}}" target="_blank" class="text-dark">{{$contestant->position->name}}</a></h5>
                                                
                                            </div>
                                        </td>

                                        <td>
                                            <ul class="list-unstyled ps-0 mb-0">
                                                
                                                <li><b><a href="{{$contestant->vote_link}}" target="_blank"  >{{$contestant->name}}</b></li>
                                                <li><a href="{{$contestant->vote_link}}" target="_blank" >{{$contestant->vote_link}}</p></li>
                                            </ul>
                                        </td>

                                   

                                        <td style="width: 220px;">
                                            <h3 class="mb-0 font-size-20"><b>₦{{$contestant->position->price}}</b></h3>
                                        </td>

                                        <td><a href="{{$contestant->vote_link}}" target="_blank"  >
                                            <button type="button" class="btn btn-primary waves-effect waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20v-4.55l2.75-3.125l1.425 1.425l-2 2.25h13.65l-1.95-2.2l1.425-1.425L21 15.45V20q0 .825-.587 1.413T19 22zm0-2h14v-2H5zm5.625-5.625L7.1 10.85q-.575-.575-.562-1.412t.587-1.413l4.9-4.9q.575-.575 1.425-.6t1.425.55L18.4 6.6q.575.575.6 1.4t-.55 1.4l-5 5q-.575.575-1.412.563t-1.413-.588M17 8.025L13.475 4.5l-4.95 4.95l3.525 3.525zM5 20v-2z"/></svg> Vote</button>
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
    </div>
    </div>
      
    </div>
    <script>
    function searchBy(select) {
        var selectedValue = select.value;
        window.location.href = "{{route('contest')}}?id=" + selectedValue; 
    }
</script>
  </section><!-- End Registration Section -->


</main><!-- End #main -->
@include('landingpage.footer')


@endsection