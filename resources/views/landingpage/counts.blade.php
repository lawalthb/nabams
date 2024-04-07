@php
$counts = App\Models\WebCounters::orderBy('position')->get();

@endphp

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row no-gutters">

     @foreach ($counts as $count )
       
    
      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class="{{$count->icon}}"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$count->count}}" data-purecounter-duration="1" class="purecounter"></span>
          <p>{!! $count->text !!}</p>
          <a href="#">Find out more &raquo;</a>
        </div>
      </div>
      @endforeach
      

    </div>

  </div>
</section><!-- End Counts Section -->