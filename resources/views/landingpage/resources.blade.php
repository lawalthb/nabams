@php
$resources = App\Models\WebResources::orderBy('position')->get();


@endphp

<!-- ======= Resources Section ======= -->
<section id="services" class="services services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Resources</h2>
     
    </div>

    <div class="row">

    @foreach ($resources as $resource )
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon"><i class="{{$resource->icon}}"></i></div>
        <h4 class="title"><a href="">{{$resource->title}}</a></h4>
        <p class="description">{{$resource->text}}</p>
      </div>

    @endforeach
      
    </div>

  </div>
</section><!-- End Resources Section -->