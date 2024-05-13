@extends('landingpage.layout')



@section('title', 'Thank You - Contest')

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

      



<div class="card-body">
<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    Thanks
        </div>
    </div>
    </div>
    </div>
    </div>
      
    </div>
    <div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Thanks</strong> for your vote, your vote has been added.</p>
  <hr>
  <p>
   Go back to our <a href="/contest">Contest Page</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="/" role="button">Home Page </a>
  </p>
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