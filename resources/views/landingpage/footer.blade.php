@php
$contact = App\Models\WebContacts::where('id', 1)->first();

$header = App\Models\WebHeaders::where('id', 1)->first();

@endphp


<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h3><img src="{{$header->logo}}" width="100px" >
          
            {{$header->site_name}}</h3>
              <strong>Phone:</strong>{{$contact->phone}}<br>
              <strong>Email:</strong>{{$contact->email1}}<br>
          
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Resources</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Membership</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Events</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Account</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Login</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Registration</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">My Profile</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Election</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Contests</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Visitor's Newsletter</h4>
          <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est </p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; 2024 Copyright <strong><span> {{$header->site_name}}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

     
    </div>
  </div>
</footer><!-- End Footer -->