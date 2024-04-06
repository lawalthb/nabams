
@php
$vissions = App\Models\WebVissions::get();

@endphp

<!-- ======= Vission and Mission Section ======= -->
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

  

    <div class="row">
    @foreach ( $vissions as $vission )
      <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="icon"><i class="{{$vission->icon}}"></i></div>
          <h4 class="title"><a href="">{{$vission->name}}</a></h4>
          <p class="description">{{$vission->text}}</p>
        </div>
      </div>
      @endforeach
     

    </div>

  </div>
</section><!-- End Vission and mission Section -->