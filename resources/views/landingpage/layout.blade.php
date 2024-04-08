@php
$colours = App\Models\WebColours::all();
$fill_colour = $colours[0]->colour;
$main_colour = $colours[1]->colour;
$text_colour = $colours[2]->colour;
$header = App\Models\WebHeaders::where('id', 1)->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset($header->logo)}}" rel="icon">
  <link href="{{asset('landingpage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landingpage/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('landingpage/assets/css/style.css')}}" rel="stylesheet">

  <style>
    /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
    body {
      font-family: "Open Sans", sans-serif;
      color: #444444;
    }

    a {
      color: {{$fill_colour}};
      text-decoration: none;
    }

    a:hover {
      color: #65c9cd;
      text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Roboto", sans-serif;
    }

    /*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 9999;
      overflow: hidden;
      background: {{$main_colour}};
    }

    #preloader:before {
      content: "";
      position: fixed;
      top: calc(50% - 30px);
      left: calc(50% - 30px);
      border: 6px solid {{$fill_colour}};
      border-top-color: #ecf8f9;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: animate-preloader 1s linear infinite;
    }

    @keyframes animate-preloader {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
    .back-to-top {
      position: fixed;
      visibility: hidden;
      opacity: 0;
      right: 15px;
      bottom: 15px;
      z-index: 996;
      background: {{$fill_colour}};
      width: 40px;
      height: 40px;
      border-radius: 4px;
      transition: all 0.4s;
    }

    .back-to-top i {
      font-size: 28px;
      color: {{$main_colour}};
      line-height: 0;
    }

    .back-to-top:hover {
      background: #5ec6ca;
      color: {{$main_colour}};
    }

    .back-to-top.active {
      visibility: visible;
      opacity: 1;
    }

    /*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
    @media screen and (max-width: 768px) {
      [data-aos-delay] {
        transition-delay: 0 !important;
      }
    }

    /*--------------------------------------------------------------
# Top Bar
--------------------------------------------------------------*/
    #topbar {
      background: {{$fill_colour}};
      color: {{$main_colour}};
      height: 40px;
      font-size: 16px;
      font-weight: 600;
      z-index: 996;
      transition: all 0.5s;
    }

    #topbar.topbar-scrolled {
      top: -40px;
    }

    #topbar i {
      padding-right: 6px;
      line-height: 0;
    }

    /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
    #header {
      background: {{$main_colour}};
      transition: all 0.5s;
      z-index: 997;
      padding: 20px 0;
      top: 40px;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 992px) {
      #header {
        padding: 15px 0;
      }
    }

    #header.header-scrolled {
      top: 0;
    }

    #header .logo {
      font-size: 28px;
      margin: 0;
      padding: 0;
      line-height: 1;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    #header .logo a {
      color: {{$text_colour }};
    }

    #header .logo img {
      max-height: 40px;
    }

    /**
* Appointment Button
*/
    .appointment-btn {
      margin-left: 25px;
      background: {{$fill_colour}};
      color: {{$main_colour}};
      border-radius: 4px;
      padding: 8px 25px;
      white-space: nowrap;
      transition: 0.3s;
      font-size: 14px;
      display: inline-block;
    }

    .appointment-btn:hover {
      background: #65c9cd;
      color: {{$main_colour}};
    }

    @media (max-width: 768px) {
      .appointment-btn {
        margin: 0 15px 0 0;
        padding: 6px 15px;
      }
    }

    /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
    /**
* Desktop Navigation
*/
    .navbar {
      padding: 0;
    }

    .navbar ul {
      margin: 0;
      padding: 0;
      display: flex;
      list-style: none;
      align-items: center;
    }

    .navbar li {
      position: relative;
    }

    .navbar a,
    .navbar a:focus {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0 10px 30px;
      font-family: "Roboto", sans-serif;
      font-size: 13px;
      color: #626262;
      white-space: nowrap;
      transition: 0.3s;
      text-transform: uppercase;
      font-weight: 500;
    }

    .navbar a i,
    .navbar a:focus i {
      font-size: 12px;
      line-height: 0;
      margin-left: 5px;
    }

    .navbar a:hover,
    .navbar .active,
    .navbar .active:focus,
    .navbar li:hover>a {
      color: {{$fill_colour}};
    }

    .navbar .dropdown ul {
      display: block;
      position: absolute;
      left: 14px;
      top: calc(100% + 30px);
      margin: 0;
      padding: 10px 0;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      background: {{$main_colour}};
      box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
      transition: 0.3s;
      border-radius: 4px;
    }

    .navbar .dropdown ul li {
      min-width: 200px;
    }

    .navbar .dropdown ul a {
      padding: 10px 20px;
      text-transform: none;
    }

    .navbar .dropdown ul a i {
      font-size: 12px;
    }

    .navbar .dropdown ul a:hover,
    .navbar .dropdown ul .active:hover,
    .navbar .dropdown ul li:hover>a {
      color: {{$fill_colour}};
    }

    .navbar .dropdown:hover>ul {
      opacity: 1;
      top: 100%;
      visibility: visible;
    }

    .navbar .dropdown .dropdown ul {
      top: 0;
      left: calc(100% - 30px);
      visibility: hidden;
    }

    .navbar .dropdown .dropdown:hover>ul {
      opacity: 1;
      top: 0;
      left: 100%;
      visibility: visible;
    }

    @media (max-width: 1366px) {
      .navbar .dropdown .dropdown ul {
        left: -90%;
      }

      .navbar .dropdown .dropdown:hover>ul {
        left: -100%;
      }
    }

    /**
* Mobile Navigation
*/
    .mobile-nav-toggle {
      color: {{$text_colour }};
      font-size: 28px;
      cursor: pointer;
      display: none;
      line-height: 0;
      transition: 0.5s;
    }

    .mobile-nav-toggle.bi-x {
      color: {{$main_colour}};
    }

    @media (max-width: 991px) {
      .mobile-nav-toggle {
        display: block;
      }

      .navbar ul {
        display: none;
      }
    }

    .navbar-mobile {
      position: fixed;
      overflow: hidden;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background: rgba(60, 60, 60, 0.9);
      transition: 0.3s;
      z-index: 999;
    }

    .navbar-mobile .mobile-nav-toggle {
      position: absolute;
      top: 15px;
      right: 15px;
    }

    .navbar-mobile ul {
      display: block;
      position: absolute;
      top: 55px;
      right: 15px;
      bottom: 15px;
      left: 15px;
      padding: 10px 0;
      border-radius: 8px;
      background-color: {{$main_colour}};
      overflow-y: auto;
      transition: 0.3s;
    }

    .navbar-mobile a,
    .navbar-mobile a:focus {
      padding: 10px 20px;
      font-size: 15px;
      color: {{$text_colour }};
    }

    .navbar-mobile a:hover,
    .navbar-mobile .active,
    .navbar-mobile li:hover>a {
      color: {{$fill_colour}};
    }

    .navbar-mobile .dropdown ul {
      position: static;
      display: none;
      margin: 10px 20px;
      padding: 10px 0;
      z-index: 99;
      opacity: 1;
      visibility: visible;
      background: {{$main_colour}};
      box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    }

    .navbar-mobile .dropdown ul li {
      min-width: 200px;
    }

    .navbar-mobile .dropdown ul a {
      padding: 10px 20px;
    }

    .navbar-mobile .dropdown ul a i {
      font-size: 12px;
    }

    .navbar-mobile .dropdown ul a:hover,
    .navbar-mobile .dropdown ul .active:hover,
    .navbar-mobile .dropdown ul li:hover>a {
      color: {{$fill_colour}};
    }

    .navbar-mobile .dropdown>.dropdown-active {
      display: block;
    }

    /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
    #hero {
      width: 100%;
      height: 100vh;
      background-color: rgba(60, 60, 60, 0.8);
      overflow: hidden;
      position: relative;
    }

    #hero .carousel,
    #hero .carousel-inner,
    #hero .carousel-item,
    #hero .carousel-item::before {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
    }

    #hero .carousel-item {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: flex-end;
    }

    #hero .container {
      text-align: center;
      background: rgba(255, 255, 255, 0.9);
      padding-top: 30px;
      padding-bottom: 30px;
      margin-bottom: 50px;
      border-top: 4px solid {{$fill_colour}};
    }

    @media (max-width: 1200px) {
      #hero .container {
        margin-left: 50px;
        margin-right: 50px;
      }
    }

    #hero h2 {
      color: #2f2f2f;
      margin-bottom: 20px;
      font-size: 36px;
      font-weight: 700;
    }

    #hero p {
      margin: 0 auto 30px auto;
      color: {{$text_colour }};
    }

    #hero .carousel-inner .carousel-item {
      transition-property: opacity;
      background-position: center top;
    }

    #hero .carousel-inner .carousel-item,
    #hero .carousel-inner .active.carousel-item-start,
    #hero .carousel-inner .active.carousel-item-end {
      opacity: 0;
    }

    #hero .carousel-inner .active,
    #hero .carousel-inner .carousel-item-next.carousel-item-start,
    #hero .carousel-inner .carousel-item-prev.carousel-item-end {
      opacity: 1;
      transition: 0.5s;
    }

    #hero .carousel-inner .carousel-item-next,
    #hero .carousel-inner .carousel-item-prev,
    #hero .carousel-inner .active.carousel-item-start,
    #hero .carousel-inner .active.carousel-item-end {
      left: 0;
      transform: translate3d(0, 0, 0);
    }

    #hero .carousel-control-next-icon,
    #hero .carousel-control-prev-icon {
      background: none;
      font-size: 30px;
      line-height: 0;
      width: auto;
      height: auto;
      background: rgba(63, 187, 192, 0.8);
      border-radius: 50px;
      transition: 0.3s;
      color: rgba(255, 255, 255, 0.5);
      width: 54px;
      height: 54px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #hero .carousel-control-next-icon:hover,
    #hero .carousel-control-prev-icon:hover {
      background: {{$fill_colour}};
      color: rgba(255, 255, 255, 0.8);
    }

    #hero .carousel-indicators li {
      list-style-type: none;
      cursor: pointer;
      background: {{$main_colour}};
      overflow: hidden;
      border: 0;
      width: 12px;
      height: 12px;
      border-radius: 50px;
      opacity: 0.6;
      transition: 0.3s;
    }

    #hero .carousel-indicators li.active {
      opacity: 1;
      background: {{$fill_colour}};
    }

    #hero .btn-get-started {
      font-family: "Roboto", sans-serif;
      font-weight: 500;
      font-size: 14px;
      letter-spacing: 1px;
      display: inline-block;
      padding: 14px 32px;
      border-radius: 4px;
      transition: 0.5s;
      line-height: 1;
      color: {{$main_colour}};
      background: {{$fill_colour}};
    }

    #hero .btn-get-started:hover {
      background: #65c9cd;
    }

    @media (max-width: 992px) {
      #hero {
        height: 100vh;
      }

      #hero .container {
        margin-top: 100px;
      }
    }

    @media (max-width: 768px) {
      #hero h2 {
        font-size: 28px;
      }
    }

    @media (min-width: 1024px) {

      #hero .carousel-control-prev,
      #hero .carousel-control-next {
        width: 5%;
      }
    }

    @media (max-height: 500px) {
      #hero {
        height: 160vh;
      }
    }

    /*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
    section {
      padding: 60px 0;
      overflow: hidden;
    }

    .section-bg {
      background-color: #f7fcfc;
    }

    .section-title {
      text-align: center;
      padding-bottom: 30px;
    }

    .section-title h2 {
      font-size: 32px;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 20px;
      padding-bottom: 20px;
      position: relative;
    }

    .section-title h2::after {
      content: "";
      position: absolute;
      display: block;
      width: 50px;
      height: 3px;
      background: {{$fill_colour}};
      bottom: 0;
      left: calc(50% - 25px);
    }

    .section-title p {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
    .breadcrumbs {
      padding: 20px 0;
      background-color: #ecf8f9;
      min-height: 40px;
      margin-top: 120px;
    }

    @media (max-width: 992px) {
      .breadcrumbs {
        margin-top: 70px;
      }
    }

    .breadcrumbs h2 {
      font-size: 24px;
      font-weight: 300;
      margin: 0;
    }

    @media (max-width: 992px) {
      .breadcrumbs h2 {
        margin: 0 0 10px 0;
      }
    }

    .breadcrumbs ol {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      padding: 0;
      margin: 0;
      font-size: 14px;
    }

    .breadcrumbs ol li+li {
      padding-left: 10px;
    }

    .breadcrumbs ol li+li::before {
      display: inline-block;
      padding-right: 10px;
      color: #6c757d;
      content: "/";
    }

    @media (max-width: 768px) {
      .breadcrumbs .d-flex {
        display: block !important;
      }

      .breadcrumbs ol {
        display: block;
      }

      .breadcrumbs ol li {
        display: inline-block;
      }
    }

    /*--------------------------------------------------------------
# Featured Services
--------------------------------------------------------------*/
    .featured-services .icon-box {
      padding: 30px;
      position: relative;
      overflow: hidden;
      background: {{$main_colour}};
      box-shadow: 0 0 29px 0 rgba(68, 88, 144, 0.12);
      transition: all 0.3s ease-in-out;
      border-radius: 8px;
      z-index: 1;
    }

    .featured-services .icon-box::before {
      content: "";
      position: absolute;
      background: #d9f1f2;
      right: 0;
      left: 0;
      bottom: 0;
      top: 100%;
      transition: all 0.3s;
      z-index: -1;
    }

    .featured-services .icon-box:hover::before {
      background: {{$fill_colour}};
      top: 0;
      border-radius: 0px;
    }

    .featured-services .icon {
      margin-bottom: 15px;
    }

    .featured-services .icon i {
      font-size: 48px;
      line-height: 1;
      color: {{$fill_colour}};
      transition: all 0.3s ease-in-out;
    }

    .featured-services .title {
      font-weight: 700;
      margin-bottom: 15px;
      font-size: 18px;
    }

    .featured-services .title a {
      color: #111;
    }

    .featured-services .description {
      font-size: 15px;
      line-height: 28px;
      margin-bottom: 0;
    }

    .featured-services .icon-box:hover .title a,
    .featured-services .icon-box:hover .description {
      color: {{$main_colour}};
    }

    .featured-services .icon-box:hover .icon i {
      color: {{$main_colour}};
    }

    /*--------------------------------------------------------------
# Cta
--------------------------------------------------------------*/
    .cta {
      background: {{$fill_colour}};
      color: {{$main_colour}};
      background-size: cover;
      padding: 60px 0;
    }

    .cta h3 {
      font-size: 28px;
      font-weight: 700;
    }

    .cta .cta-btn {
      font-family: "Roboto", sans-serif;
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 1px;
      display: inline-block;
      padding: 10px 35px;
      border-radius: 25px;
      transition: 0.5s;
      margin-top: 10px;
      border: 2px solid {{$main_colour}};
      color: {{$main_colour}};
    }

    .cta .cta-btn:hover {
      background: {{$main_colour}};
      color: {{$fill_colour}};
    }

    /*--------------------------------------------------------------
# About Us
--------------------------------------------------------------*/
    .about .content h3 {
      font-weight: 600;
      font-size: 26px;
    }

    .about .content ul {
      list-style: none;
      padding: 0;
    }

    .about .content ul li {
      padding-bottom: 10px;
    }

    .about .content ul i {
      font-size: 20px;
      padding-right: 4px;
      color: {{$fill_colour}};
    }

    .about .content p:last-child {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Counts
--------------------------------------------------------------*/
    .counts {
      padding-bottom: 30px;
    }

    .counts .count-box {
      box-shadow: -10px -5px 40px 0 rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 100%;
    }

    .counts .count-box i {
      display: block;
      font-size: 30px;
      color: {{$fill_colour}};
      float: left;
    }

    .counts .count-box span {
      font-size: 42px;
      line-height: 24px;
      display: block;
      font-weight: 700;
      color: {{$text_colour }};
      margin-left: 50px;
    }

    .counts .count-box p {
      padding: 30px 0 0 0;
      margin: 0;
      font-family: "Roboto", sans-serif;
      font-size: 14px;
    }

    .counts .count-box a {
      font-weight: 600;
      display: block;
      margin-top: 20px;
      color: #7b7b7b;
      font-size: 15px;
      font-family: "Poppins", sans-serif;
      transition: ease-in-out 0.3s;
    }

    .counts .count-box a:hover {
      color: {{$fill_colour}};
    }

    /*--------------------------------------------------------------
# Features
--------------------------------------------------------------*/
    .features .icon-box h4 {
      font-size: 20px;
      font-weight: 700;
      margin: 5px 0 10px 60px;
    }

    .features .icon-box i {
      font-size: 48px;
      float: left;
      color: {{$fill_colour}};
    }

    .features .icon-box p {
      font-size: 15px;
      color: #848484;
      margin-left: 60px;
    }

    .features .image {
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 400px;
    }

    /*--------------------------------------------------------------
# Services
--------------------------------------------------------------*/
    .services .icon-box {
      margin-bottom: 20px;
      text-align: center;
    }

    .services .icon {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 80px;
      height: 80px;
      margin-bottom: 20px;
      background: {{$main_colour}};
      border-radius: 50%;
      transition: 0.5s;
      color: {{$fill_colour}};
      overflow: hidden;
      box-shadow: 0px 0 25px rgba(0, 0, 0, 0.15);
    }

    .services .icon i {
      font-size: 36px;
      line-height: 0;
    }

    .services .icon-box:hover .icon {
      box-shadow: 0px 0 25px rgba(63, 187, 192, 0.3);
    }

    .services .title {
      font-weight: 600;
      margin-bottom: 15px;
      font-size: 18px;
      position: relative;
      padding-bottom: 15px;
    }

    .services .title a {
      color: #444444;
      transition: 0.3s;
    }

    .services .title a:hover {
      color: {{$fill_colour}};
    }

    .services .title::after {
      content: "";
      position: absolute;
      display: block;
      width: 50px;
      height: 2px;
      background: {{$fill_colour}};
      bottom: 0;
      left: calc(50% - 25px);
    }

    .services .description {
      line-height: 24px;
      font-size: 14px;
    }

    /*--------------------------------------------------------------
# Appointments
--------------------------------------------------------------*/
    .appointment .php-email-form {
      width: 100%;
    }

    .appointment .php-email-form .form-group {
      padding-bottom: 8px;
    }

    .appointment .php-email-form .validate {
      display: none;
      color: red;
      margin: 0 0 15px 0;
      font-weight: 400;
      font-size: 13px;
    }

    .appointment .php-email-form .error-message {
      display: none;
      color: {{$main_colour}};
      background: #ed3c0d;
      text-align: left;
      padding: 15px;
      font-weight: 600;
    }

    .appointment .php-email-form .error-message br+br {
      margin-top: 25px;
    }

    .appointment .php-email-form .sent-message {
      display: none;
      color: {{$main_colour}};
      background: #18d26e;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }

    .appointment .php-email-form .loading {
      display: none;
      background: {{$main_colour}};
      text-align: center;
      padding: 15px;
    }

    .appointment .php-email-form .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid #18d26e;
      border-top-color: #eee;
      animation: animate-loading 1s linear infinite;
    }

    .appointment .php-email-form input,
    .appointment .php-email-form textarea,
    .appointment .php-email-form select {
      border-radius: 0;
      box-shadow: none;
      font-size: 14px;
      padding: 10px !important;
    }

    .appointment .php-email-form input:focus,
    .appointment .php-email-form textarea:focus,
    .appointment .php-email-form select:focus {
      border-color: {{$fill_colour}};
    }

    .appointment .php-email-form input,
    .appointment .php-email-form select {
      height: 44px;
    }

    .appointment .php-email-form textarea {
      padding: 10px 12px;
    }

    .appointment .php-email-form button[type=submit] {
      background: {{$fill_colour}};
      border: 0;
      padding: 10px 35px;
      color: {{$main_colour}};
      transition: 0.4s;
      border-radius: 50px;
    }

    .appointment .php-email-form button[type=submit]:hover {
      background: #52c2c6;
    }

    /*--------------------------------------------------------------
# Departments
--------------------------------------------------------------*/
    .departments .nav-tabs {
      border: 0;
    }

    .departments .nav-link {
      border: 0;
      padding: 20px;
      color: {{$text_colour }};
      border-radius: 0;
      border-left: 5px solid {{$main_colour}};
      cursor: pointer;
    }

    .departments .nav-link h4 {
      font-size: 18px;
      font-weight: 600;
      transition: 0.3s;
    }

    .departments .nav-link p {
      font-size: 14px;
      margin-bottom: 0;
    }

    .departments .nav-link:hover h4 {
      color: {{$fill_colour}};
    }

    .departments .nav-link.active {
      background: #f7fcfc;
      border-color: {{$fill_colour}};
    }

    .departments .nav-link.active h4 {
      color: {{$fill_colour}};
    }

    .departments .tab-pane.active {
      animation: slide-down 0.5s ease-out;
    }

    .departments .tab-pane img {
      float: left;
      max-width: 300px;
      padding: 0 15px 15px 0;
    }

    @media (max-width: 768px) {
      .departments .tab-pane img {
        float: none;
        padding: 0 0 15px 0;
        max-width: 100%;
      }
    }

    .departments .tab-pane h3 {
      font-size: 26px;
      font-weight: 600;
      margin-bottom: 20px;
      color: {{$fill_colour}};
    }

    .departments .tab-pane p {
      color: #777777;
    }

    .departments .tab-pane p:last-child {
      margin-bottom: 0;
    }

    @keyframes slide-down {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    /*--------------------------------------------------------------
# Testimonials
--------------------------------------------------------------*/
    .testimonials .testimonials-carousel,
    .testimonials .testimonials-slider {
      overflow: hidden;
    }

    .testimonials .testimonial-item {
      box-sizing: content-box;
      min-height: 320px;
    }

    .testimonials .testimonial-item .testimonial-img {
      width: 90px;
      border-radius: 50%;
      margin: -40px 0 0 40px;
      position: relative;
      z-index: 2;
      border: 6px solid {{$main_colour}};
    }

    .testimonials .testimonial-item h3 {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 5px 45px;
      color: #111;
    }

    .testimonials .testimonial-item h4 {
      font-size: 14px;
      color: #999;
      margin: 0 0 0 45px;
    }

    .testimonials .testimonial-item .quote-icon-left,
    .testimonials .testimonial-item .quote-icon-right {
      color: #b2e4e6;
      font-size: 26px;
    }

    .testimonials .testimonial-item .quote-icon-left {
      display: inline-block;
      left: -5px;
      position: relative;
    }

    .testimonials .testimonial-item .quote-icon-right {
      display: inline-block;
      right: -5px;
      position: relative;
      top: 10px;
    }

    .testimonials .testimonial-item p {
      font-style: italic;
      margin: 0 15px 0 15px;
      padding: 20px 20px 60px 20px;
      background: #f0fafa;
      position: relative;
      border-radius: 6px;
      position: relative;
      z-index: 1;
    }

    .testimonials .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background-color: {{$main_colour}};
      opacity: 1;
      border: 1px solid {{$fill_colour}};
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet-active {
      background-color: {{$fill_colour}};
    }

    /*--------------------------------------------------------------
# Doctors
--------------------------------------------------------------*/
    .doctors .member {
      margin-bottom: 20px;
      overflow: hidden;
      text-align: center;
      border-radius: 4px;
      background: {{$main_colour}};
      box-shadow: 0px 2px 15px rgba(63, 187, 192, 0.1);
    }

    .doctors .member .member-img {
      position: relative;
      overflow: hidden;
    }

    .doctors .member .social {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      height: 40px;
      opacity: 0;
      transition: ease-in-out 0.3s;
      background: rgba(255, 255, 255, 0.85);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .doctors .member .social a {
      transition: color 0.3s;
      color: {{$text_colour }};
      margin: 0 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .doctors .member .social a i {
      line-height: 0;
    }

    .doctors .member .social a:hover {
      color: {{$fill_colour}};
    }

    .doctors .member .social i {
      font-size: 18px;
      margin: 0 2px;
    }

    .doctors .member .member-info {
      padding: 25px 15px;
    }

    .doctors .member .member-info h4 {
      font-weight: 700;
      margin-bottom: 5px;
      font-size: 18px;
      color: {{$text_colour }};
    }

    .doctors .member .member-info span {
      display: block;
      font-size: 13px;
      font-weight: 400;
      color: #aaaaaa;
    }

    .doctors .member .member-info p {
      font-style: italic;
      font-size: 14px;
      line-height: 26px;
      color: #777777;
    }

    .doctors .member:hover .social {
      opacity: 1;
    }

    /*--------------------------------------------------------------
# Gallery
--------------------------------------------------------------*/
    .gallery {
      overflow: hidden;
    }

    .gallery .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .gallery .swiper-pagination .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background-color: {{$main_colour}};
      opacity: 1;
      border: 1px solid {{$fill_colour}};
    }

    .gallery .swiper-pagination .swiper-pagination-bullet-active {
      background-color: {{$fill_colour}};
    }

    .gallery .swiper-slide-active {
      text-align: center;
    }

    @media (min-width: 992px) {
      .gallery .swiper-wrapper {
        padding: 40px 0;
      }

      .gallery .swiper-slide-active {
        border: 6px solid {{$fill_colour}};
        padding: 4px;
        background: {{$main_colour}};
        z-index: 1;
        transform: scale(1.2);
        margin-top: 10px;
      }
    }

    /*--------------------------------------------------------------
# Pricing
--------------------------------------------------------------*/
    .pricing .box {
      padding: 20px;
      background: {{$main_colour}};
      text-align: center;
      box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.12);
      border-radius: 4px;
      position: relative;
      overflow: hidden;
    }

    .pricing h3 {
      font-weight: 400;
      margin: -20px -20px 20px -20px;
      padding: 20px 15px;
      font-size: 16px;
      font-weight: 600;
      color: #777777;
      background: #f8f8f8;
    }

    .pricing h4 {
      font-size: 36px;
      color: {{$fill_colour}};
      font-weight: 600;
      font-family: "Poppins", sans-serif;
      margin-bottom: 20px;
    }

    .pricing h4 sup {
      font-size: 20px;
      top: -15px;
      left: -3px;
    }

    .pricing h4 span {
      color: #bababa;
      font-size: 16px;
      font-weight: 300;
    }

    .pricing ul {
      padding: 0;
      list-style: none;
      color: #444444;
      text-align: center;
      line-height: 20px;
      font-size: 14px;
    }

    .pricing ul li {
      padding-bottom: 16px;
    }

    .pricing ul i {
      color: {{$fill_colour}};
      font-size: 18px;
      padding-right: 4px;
    }

    .pricing ul .na {
      color: #ccc;
      text-decoration: line-through;
    }

    .pricing .btn-wrap {
      margin: 20px -20px -20px -20px;
      padding: 20px 15px;
      background: #f8f8f8;
      text-align: center;
    }

    .pricing .btn-buy {
      background: {{$fill_colour}};
      display: inline-block;
      padding: 8px 35px 10px 35px;
      border-radius: 4px;
      color: {{$main_colour}};
      transition: none;
      font-size: 14px;
      font-weight: 400;
      font-family: "Roboto", sans-serif;
      font-weight: 600;
      transition: 0.3s;
    }

    .pricing .btn-buy:hover {
      background: #65c9cd;
    }

    .pricing .featured h3 {
      color: {{$main_colour}};
      background: {{$fill_colour}};
    }

    .pricing .advanced {
      width: 200px;
      position: absolute;
      top: 18px;
      right: -68px;
      transform: rotate(45deg);
      z-index: 1;
      font-size: 14px;
      padding: 1px 0 3px 0;
      background: {{$fill_colour}};
      color: {{$main_colour}};
    }

    /*--------------------------------------------------------------
# Frequently Asked Questioins
--------------------------------------------------------------*/
    .faq {
      padding: 60px 0;
    }

    .faq .faq-list {
      padding: 0;
      list-style: none;
    }

    .faq .faq-list li {
      border-bottom: 1px solid #d9f1f2;
      margin-bottom: 20px;
      padding-bottom: 20px;
    }

    .faq .faq-list .question {
      display: block;
      position: relative;
      font-family: {{$fill_colour}};
      font-size: 18px;
      line-height: 24px;
      font-weight: 400;
      padding-left: 25px;
      cursor: pointer;
      color: #32969a;
      transition: 0.3s;
    }

    .faq .faq-list i {
      font-size: 16px;
      position: absolute;
      left: 0;
      top: -2px;
    }

    .faq .faq-list p {
      margin-bottom: 0;
      padding: 10px 0 0 25px;
    }

    .faq .faq-list .icon-show {
      display: none;
    }

    .faq .faq-list .collapsed {
      color: black;
    }

    .faq .faq-list .collapsed:hover {
      color: {{$fill_colour}};
    }

    .faq .faq-list .collapsed .icon-show {
      display: inline-block;
      transition: 0.6s;
    }

    .faq .faq-list .collapsed .icon-close {
      display: none;
      transition: 0.6s;
    }

    /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
    .contact .info-box {
      color: #444444;
      text-align: center;
      box-shadow: 0 0 20px rgba(214, 215, 216, 0.5);
      padding: 20px 0 30px 0;
    }

    .contact .info-box i {
      font-size: 32px;
      color: {{$fill_colour}};
      border-radius: 50%;
      padding: 8px;
      border: 2px dotted #c5ebec;
    }

    .contact .info-box h3 {
      font-size: 20px;
      color: #777777;
      font-weight: 700;
      margin: 10px 0;
    }

    .contact .info-box p {
      padding: 0;
      line-height: 24px;
      font-size: 14px;
      margin-bottom: 0;
    }

    .contact .php-email-form {
      box-shadow: 0 0 20px rgba(214, 215, 216, 0.5);
      padding: 30px;
    }

    .contact .php-email-form .error-message {
      display: none;
      color: {{$main_colour}};
      background: #ed3c0d;
      text-align: left;
      padding: 15px;
      font-weight: 600;
    }

    .contact .php-email-form .error-message br+br {
      margin-top: 25px;
    }

    .contact .php-email-form .sent-message {
      display: none;
      color: {{$main_colour}};
      background: #18d26e;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }

    .contact .php-email-form .loading {
      display: none;
      background: {{$main_colour}};
      text-align: center;
      padding: 15px;
    }

    .contact .php-email-form .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid #18d26e;
      border-top-color: #eee;
      animation: animate-loading 1s linear infinite;
    }

    .contact .php-email-form input,
    .contact .php-email-form textarea {
      border-radius: 4px;
      box-shadow: none;
      font-size: 14px;
    }

    .contact .php-email-form input:focus,
    .contact .php-email-form textarea:focus {
      border-color: {{$fill_colour}};
    }

    .contact .php-email-form input {
      padding: 10px 15px;
    }

    .contact .php-email-form textarea {
      padding: 12px 15px;
    }

    .contact .php-email-form button[type=submit] {
      background: {{$fill_colour}};
      border: 0;
      padding: 10px 30px;
      color: {{$main_colour}};
      transition: 0.4s;
      border-radius: 4px;
    }

    .contact .php-email-form button[type=submit]:hover {
      background: #65c9cd;
    }

    @keyframes animate-loading {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
    #footer {
      background: #eeeeee;
      padding: 0 0 30px 0;
      color: {{$text_colour }};
      font-size: 14px;
    }

    #footer .footer-top {
      background: #f6f6f6;
      padding: 60px 0 30px 0;
    }

    #footer .footer-top .footer-info {
      margin-bottom: 30px;
    }

    #footer .footer-top .footer-info h3 {
      font-size: 24px;
      margin: 0 0 20px 0;
      padding: 2px 0 2px 0;
      line-height: 1;
      font-weight: 700;
    }

    #footer .footer-top .footer-info p {
      font-size: 14px;
      line-height: 24px;
      margin-bottom: 0;
      font-family: "Roboto", sans-serif;
    }

    #footer .footer-top .social-links a {
      font-size: 18px;
      display: inline-block;
      background: {{$fill_colour}};
      color: {{$main_colour}};
      line-height: 1;
      padding: 8px 0;
      margin-right: 4px;
      border-radius: 4px;
      text-align: center;
      width: 36px;
      height: 36px;
      transition: 0.3s;
    }

    #footer .footer-top .social-links a:hover {
      background: #65c9cd;
      text-decoration: none;
    }

    #footer .footer-top h4 {
      font-size: 16px;
      font-weight: 600;
      position: relative;
      padding-bottom: 12px;
    }

    #footer .footer-top .footer-links {
      margin-bottom: 30px;
    }

    #footer .footer-top .footer-links ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    #footer .footer-top .footer-links ul i {
      padding-right: 2px;
      color: {{$fill_colour}};
      font-size: 18px;
      line-height: 1;
    }

    #footer .footer-top .footer-links ul li {
      padding: 10px 0;
      display: flex;
      align-items: center;
    }

    #footer .footer-top .footer-links ul li:first-child {
      padding-top: 0;
    }

    #footer .footer-top .footer-links ul a {
      color: {{$text_colour }};
      transition: 0.3s;
      display: inline-block;
      line-height: 1;
    }

    #footer .footer-top .footer-links ul a:hover {
      color: {{$fill_colour}};
    }

    #footer .footer-top .footer-newsletter form {
      margin-top: 30px;
      background: {{$main_colour}};
      padding: 6px 10px;
      position: relative;
      border: 1px solid #d5d5d5;
      border-radius: 4px;
    }

    #footer .footer-top .footer-newsletter form input[type=email] {
      border: 0;
      padding: 4px;
      width: calc(100% - 110px);
    }

    #footer .footer-top .footer-newsletter form input[type=submit] {
      position: absolute;
      top: -1px;
      right: -1px;
      bottom: -1px;
      border: 0;
      background: none;
      font-size: 16px;
      padding: 0 20px;
      background: {{$fill_colour}};
      color: {{$main_colour}};
      transition: 0.3s;
      border-radius: 0 4px 4px 0;
    }

    #footer .footer-top .footer-newsletter form input[type=submit]:hover {
      background: #65c9cd;
    }

    #footer .copyright {
      text-align: center;
      padding-top: 30px;
    }

    #footer .credits {
      padding-top: 10px;
      text-align: center;
      font-size: 13px;
    }
  </style>
</head>

</head>

<body>
  @yield('content')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('landingpage/assets/vendor/purecounter/purecounter_vanilla.js')}}">
  </script>
  <script src="{{asset('landingpage/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('landingpage/assets/js/main.js')}}"></script>

</body>

</html>