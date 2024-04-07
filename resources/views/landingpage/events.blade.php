@php
$events = App\Models\WebEvents::orderBy('position')->get();


@endphp


<!-- ======= Events Section ======= -->
<section id="events" class="departments">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Events</h2>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <ul class="nav nav-tabs flex-column">

        @foreach ($events as $key=> $event )
          <li class="nav-item   mt-2">
            <a class="nav-link show {{ $key == 1 ? 'active' : '' }} "  data-bs-toggle="tab" data-bs-target="#tab-{{$key+1}}">
              <h4>{{$event->title}}</h4>
              <p>{{$event->short_text}}</p>
            </a>
          </li>
          @endforeach
         
          
        </ul>
      </div>
      <div class="col-lg-8">
        <div class="tab-content">

        @foreach ($events as $key=> $event2 )
          <div class="tab-pane {{ $key == 1 ? 'active' : '' }} show" id="tab-{{$key+1}}">
            <h3>{{$event2->title}}</h3>
            <p class="fst-italic">{{$event2->short_text}}</p>
            <img src="{{asset($event2->image)}}" alt="" class="img-fluid">
            <p>{{$event2->long_text}}</p>
          </div>
        @endforeach
        </div>
      </div>
    </div>

  </div>
</section><!-- End Events Section -->