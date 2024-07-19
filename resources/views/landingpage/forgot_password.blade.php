@extends('landingpage.layout')

@section('title', 'Home')

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
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2 style="margin-top: 100px;">Forgot Password</h2>

      </div>

      <form action="{{route('forgot_password_update')}}" method="post" role="form" class="php-email-form center" data-aos="fade-up" data-aos-delay="100">
        @csrf

        <div class="row center-div">
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label>Enter the Email you registered with:</label>
            <input type="text" name="email" class="form-control" id="name" placeholder="Enter your email" value="{{ old('email') }}" required>
            @error('email')
            <p class="error_msg">{{ $message }}</p>
            @enderror
          </div>

        

          <div class="text-center"><button type="submit">Submit</button></div>

      </form>

    </div>
    <script>

    </script>
  </section><!-- End Registration Section -->


</main><!-- End #main -->
@include('landingpage.footer')


@endsection