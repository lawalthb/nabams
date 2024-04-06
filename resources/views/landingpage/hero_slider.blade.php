@php
$sliders = App\Models\WebSliders::get();

@endphp
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide loop -->
      @foreach ($sliders as $slider )
        
     
      <div class="carousel-item active" style="background-image: url({{asset($slider->image)}})">
        <div class="container">
          <h2>{{$slider->caption}}</span></h2>
          <p>{{$slider->text}}</p>
          <a href="#about" class="btn-get-started scrollto">Read More</a>
        </div>
      </div>
      @endforeach
      

      
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->