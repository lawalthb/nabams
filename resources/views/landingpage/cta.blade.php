
@php
$cta = App\Models\WebCta::where('id', 1)->first();

@endphp
<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h3>{{$cta->title}}</h3>
      <p>{{$cta->text}} </p>
      <a class="cta-btn scrollto" href="#registration">{{$cta->button_text}}</a>
    </div>

  </div>
</section><!-- End Cta Section -->