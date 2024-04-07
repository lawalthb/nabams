@php
$excos = App\Models\WebExcos::orderBy('position')->get();


@endphp

<!-- ======= Excos Section ======= -->
<section id="excos" class="doctors section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Excos</h2>
         </div>

    <div class="row">
    @foreach ( $excos as $key=> $exco )
  
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="{{$key+1}}00">
              <div class="member-img">
                <img src="{{asset($exco->image)}}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>{{$exco->name}}</h4>
                <span>{{$exco->post}}</span>
              </div>
            </div>
          </div>
    @endforeach
      

     

     

    </div>

  </div>
</section><!-- End Excos Section -->