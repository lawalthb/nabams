
@php
$testimonials = App\Models\WebTestimonials::orderBy('position')->get();


@endphp


<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Testimonials</h2>
     </div>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

      @foreach ($testimonials as $testimonial )

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              {{$testimonial->testimony}}
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{asset($testimonial->picture)}}" class="testimonial-img" alt="">
            <h3>{{$testimonial->name}}</h3>
            
          </div>
        </div><!-- End testimonial item -->

      @endforeach

        

        

       

       

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->