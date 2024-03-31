@extends('landingpage.layout')

@section('title', 'Home')

@section('content')

@include('landingpage.topbar')
@include('landingpage.header')
@include('landingpage.hero_slider')





<main id="main">

  @include('landingpage.vission_mission')
  @include('landingpage.cta')
  @include('landingpage.about')
  @include('landingpage.counts')
  @include('landingpage.benefit')
  @include('landingpage.resources')
  @include('landingpage.registration')
  @include('landingpage.events')
  @include('landingpage.testimonials')
  @include('landingpage.excos')
  @include('landingpage.gallery')

  {{-- @include('landingpage.pricing') --}}
  {{-- @include('landingpage.faq')--}}
  @include('landingpage.contact')


</main><!-- End #main -->
@include('landingpage.footer')


@endsection