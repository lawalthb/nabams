
@php
$abouts = App\Models\Webabouts::where('id', 1)->first();
$header = App\Models\WebHeaders::where('id', 1)->first();
@endphp
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About {{$header->site_name}}</h2>
      <p>{{$abouts->text}}</p>
    </div>

    <div class="row">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="{{asset($abouts->image)}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
      {!!$abouts->body!!}
      </div>
    </div>
    
    {!!$abouts->custom!!}
  </div>
  
</section><!-- End About Us Section -->