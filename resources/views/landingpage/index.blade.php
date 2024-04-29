@php


  
$webSection  = App\Models\WebSetting::where('id', 1)->first();

  $webSection->maintenance;
@endphp
@if($webSection->maintenance != 'on')
@extends('landingpage.layout')

@section('title', 'Home')

@section('content')


@if($webSection->top_bar == 'on')
  @include('landingpage.topbar')
  @else
  <style>
#header{
  margin-top: -35px;
}
  </style>
@endif


@if($webSection->header == 'on')
@include('landingpage.header')
@endif


@if($webSection->slider == 'on')
@include('landingpage.hero_slider')
@endif




<main id="main">

@if($webSection->vission == 'on')
@include('landingpage.vission_mission')
@endif

@if($webSection->cta == 'on')
@include('landingpage.cta')
@endif


@if($webSection->about == 'on')
@include('landingpage.about')
@endif

@if($webSection->count == 'on')
@include('landingpage.counts')
@endif


@if($webSection->benefit == 'on')
@include('landingpage.benefit')
@endif
  

@if($webSection->resources == 'on')
@include('landingpage.resources')
@endif
  


@if($webSection->registration == 'on')
@include('landingpage.registration')
@endif
  

@if($webSection->events == 'on')
@include('landingpage.events')
@endif
  

@if($webSection->excos == 'on')
@include('landingpage.excos')
@endif
  


@if($webSection->gallery == 'on')
@include('landingpage.gallery')
@endif
  

@if($webSection->pricing == 'on')
{{-- @include('landingpage.pricing') --}}
@endif
  

@if($webSection->faq == 'on')
{{-- @include('landingpage.faq')--}}
@endif
  
@if($webSection->contact == 'on')
@include('landingpage.contact')
@endif

 

  

  
 

  



</main><!-- End #main -->


@if($webSection->footer == 'on')
@include('landingpage.footer')
@endif


@endsection

@else
@include('landingpage.maintenance')

@endif