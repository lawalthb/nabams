@extends('landingpage.layout')

@section('title', 'Home')

@section('content')

@include('landingpage.topbar')
@include('landingpage.header')






<main id="main">


  @include('landingpage.registration')



</main><!-- End #main -->
@include('landingpage.footer')


@endsection