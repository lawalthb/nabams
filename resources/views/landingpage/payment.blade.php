@extends('landingpage.layout')

@section('title', 'Home')

@section('content')

@include('landingpage.topbar')
@include('landingpage.header')

<style>

.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>




<main id="main ">

@php
$abouts = App\Models\Webabouts::where('id', 1)->first();

@endphp
<div class="container" data-aos="fade-up">
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title ">
        <br /><br />
        <br />
              <h2>{{ $contestant->name }}</h2>
      <h3>Vote for {{ $contestant->name }} as {{ $position->name }}</h3>
    </div>

    <div class="row">
      <div class="col-lg-6 text-center" data-aos="fade-right">
        <img src="{{asset($user->image)}}" height="400px" width="300px" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
      <form method="POST" action="{{ route('vote.payment.process') }}">
    @csrf
    <div class="text-center">
    <input type="hidden" name="contestant_id" value="{{ $contestant->id }}">
    <h4> Number of Votes:</h4>

    <input type="number" id="vote_number" name="num_votes" min="1" value="1" required><br /><br />
    <input type="hidden" id="amount" name="amount" min="1" value="300" required>
    <h4> Your Email:</h4>
    <input type="email" name="email" required /><br /><br />
    Amount: ₦<span id="amt">300</span><br />
    <button class="button" type="submit" style="background-color:green;">Pay to Vote</button><br />
    <br />
    <img src="{{asset('website/cards_images.webp')}}" width="200px" height="100px"  />
</div>
</form>

      </div>
      
    </div>

  </div>
</section><!-- End About Us Section -->
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
   
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var voteNumberInput = document.getElementById('vote_number');
    var amountInput = document.getElementById('amount');
    var amt = document.getElementById('amt');

    voteNumberInput.addEventListener('input', function() {
        // Get the value of vote_number input field
        var voteNumber = parseInt(this.value);

        // Calculate the new amount based on vote_number and multiply by 5
        var newAmount = voteNumber * 300;

        // Update the amount input field with the new calculated value
        amountInput.value = newAmount;
        amt.innerHTML = newAmount;
    });
});
    </script>
  </section><!-- End Registration Section -->


</main><!-- End #main -->
@include('landingpage.footer')


@endsection