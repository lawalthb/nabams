@php
$topbar = App\Models\WebTopbars::where('id', 1)->first();

@endphp
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="align-items-center d-none d-md-flex">
      <i class="bi bi-clock"></i>Current Session: {{$topbar->current_session}}
    </div>
    <div class="d-flex align-items-center">
      <i class="bi bi-phone"></i> Support: {{$topbar->support_phone}}
    </div>
  </div>
</div>