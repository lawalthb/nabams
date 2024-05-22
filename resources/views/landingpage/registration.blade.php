
@php
$reg = App\Models\WebRegistrations::where('id', 1)->first();

@endphp

<!-- ======= Registration Section ======= -->
<section id="registration" class="appointment section-bg">
  <style>
    .error_msg {
      color: red;
      font-size: x-small;
    }
  </style>
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>{{$reg->title}}</h2>
      <p>{{$reg->text}}</p>
    </div>

    <form action="{{route('register')}}#registration" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
      @csrf
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="text" name="firstname" class="form-control" id="name" placeholder="Your First Name" value="{{ old('firstname') }}" required>
          @error('firstname')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="text" class="form-control" name="lastname" id="name" value="{{ old('lastname') }}" placeholder="Your Last Name" required>
          @error('lastname')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="text" class="form-control" name="matno" id="matno" value="{{ old('matno') }}" placeholder="Your Matric Number (Optional)">
          @error('matno')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Your Email" required>
          @error('email')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Your Password" required>
          @error('password')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder=" Confirmed Password">
          @error('password_confirmation')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group mt-3">
          <input type="text" name="phone" class="form-control datepicker" id="phone" value="{{ old('phone') }}" placeholder="Your Phone" required>
          @error('phone')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-md-4 form-group mt-3">
          <select name="level" id="level" class="form-select">
            <option value="">Select Level</option>
            <option value="ND 1" {{ old('level') == 'ND 1' ? 'selected' : '' }}>ND 1</option>
            <option value="ND 2" {{ old('level') == 'ND 2' ? 'selected' : '' }}>ND 2</option>
            <option value="ND 2" {{ old('level') == 'ND 3' ? 'selected' : '' }}>ND 3</option>
            <option value="HND 1" {{ old('level') == 'HND 1' ? 'selected' : '' }}>HND 1</option>
            <option value="HND 2" {{ old('level') == 'HND 2' ? 'selected' : '' }}>HND 2</option>
            <option value="HND 3" {{ old('level') == 'HND 3' ? 'selected' : '' }}>HND 3</option>
          </select>
          @error('level')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-4 form-group mt-3">
          <select name="member_type" id="member_type" class="form-select">
            <option value="">Select Member Type</option>
            <option value="Regular" {{ old('member_type') == 'Regular' ? 'selected' : '' }}>Regular</option>
            <option value="Part-time" {{ old('member_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Alumni" {{ old('member_type') == 'Alumni' ? 'selected' : '' }}>Alumni</option>

          </select>
          @error('member_type')
          <p class="error_msg">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="form-group mt-3">
        <textarea class="form-control" name="expectation_msg" rows="5" placeholder="Your expectation in this association (Optional)">{{ old('expectation_msg') }}</textarea>
        @error('expectation_msg')
        <p class="error_msg">{{ $message }}</p>
        @enderror
      </div>
      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit">Submit form</button></div>
      <div id="error-preview"></div>

    </form>

  </div>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', function () {
                submitButton.disabled = true;
                submitButton.innerText = 'Redirecting to Payment Page...';
            });
        });
    </script>
</section><!-- End Registration Section -->