@php
$benefits = App\Models\WebBenefits::orderBy('position')->get();
$image = App\Models\WebBenefits::where('id', 1)->value('image');

@endphp

<!-- ======= Benefit Section ======= -->
<section id="benefit" class="features">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
      @foreach ($benefits as $benefit )
        <div class="icon-box mt-5 mt-lg-0">
          <i class="{{$benefit->icon}}"></i>
          <h4>{{$benefit->title}}</h4>
          <p>{{$benefit->text}}</p>
        </div>
        @endforeach
      </div>
      <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("{{asset($image)}}");' data-aos="zoom-in"></div>
    </div>

  </div>
</section><!-- End benefit Section -->