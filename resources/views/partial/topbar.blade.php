@if (Route::has('login'))
@auth
@if(Auth::User()->role == 'applicant')
<!doctype html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<meta name="author" content="John Doe">
<meta name="description" content="">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Moms Postnatal Care</title>

<script src="{{ asset('applicant/js/4n2NXumNjtg5LPp6VXLlDicTUfA.js') }}"></script>
        <link rel="apple-touch-icon" href="{{ asset('applicant/images/apple-touch-icon.html') }}">
        <link rel="shortcut icon" type="image/ico" href="{{ asset('applicant/images/favicon.html') }}" />
        <link rel="stylesheet" href="{{ asset('applicant/css/bootstrap.min.css') }}">
        <link href="{{ asset('applicant/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('applicant/css/matrialize.css') }}" rel="stylesheet">
        <link href="{{ asset('applicant/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/style.css') }}">

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
         

    <script>
        $(document).ready(function(){

            $(window).scroll(function() {
                console.log('scrolled');
                console.log(window.pageYOffset);
            });

        });
    </script>

    <style>
      .special-image {
        border-radius: 50%;
    }
    </style>

</head>
<body>

<header class="header">

<div class="header_container background-color-orange-light">
<div class="container">
<div class="row">
<div class="col">
<div class="header_content d-flex flex-row align-items-center justify-content-start">
<div class="logo_container">
<img  class="special-image" src="{{ asset('applicant/imags/moms.png') }}" style="margin-right: 1rem;">
</div><div style="display:inline-block;">
<h3 class="font-color-white" style="font-size:160%;">
Moms Postnatal Care
      </h3>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">
<li><a href="{{route('home')}}">Home</a></li>
<li><a href="{{ route('about') }}">About Us</a></li>
<li><a href="{{ route('contact') }}">Contact</a></li>
<li>
  <a href= "{{route('vacancies.index')}}" class="nav-link">Job Vacancy</a>
</li>
<li class="dropdown active ">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href= "{{route('users.show', ['user' => auth()->user()->id])}}" class="nav-link">
    <i class="tiny material-icons">account_circle</i> Profile</a></li>
<li><a href="{{ route('educations.index') }}" class="nav-link">
    <i class="tiny material-icons">school</i> Education</a></li>
<li><a href="{{ route('experiences.index') }}" class="nav-link">
    <i class="tiny material-icons">work</i> Experience</a></li>
<li><a href="{{ route('applications.index') }}" class="nav-link">
    <i class="tiny material-icons">assignment</i> Application</a></li>
<li><a href="{{ route('interviews.index') }}" class="nav-link">
    <i class="tiny material-icons">event</i> Interview</a></li>
<li> 
<a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                         <i class="tiny material-icons">logout</i> Logout 
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                          </form>
</a>
</li>
</ul>
 </li>
</li>
</ul>
<div class="hamburger menu_mm menu-vertical">
<i class="large material-icons font-color-white menu_mm menu-vertical">menu</i>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
<div class="menu_close_container">
<div class="menu_close">
<div></div>
<div></div>
</div>
</div>
<div class="search">
<form action="#" class="header_search_form menu_mm">
<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
<i class="fa fa-search menu_mm" aria-hidden="true"></i>
</button>
</form>
</div>
<nav class="menu_nav">
<ul class="menu_mm">
<li class="dropdown menu_mm">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Home
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="index.html">Home 1</a></li>
<li><a href="index2.html">Home 2</a></li>
</ul>
</li>
<li class="dropdown menu_mm">
<a class="dropdown-toggle menu_mm" data-toggle="dropdown" href="#">Job
<span class="caret"></span></a>
<ul class="dropdown-menu menu_mm">
<li class="menu_mm"><a href="job_category.html">Job List</a></li>
<li class="menu_mm"><a href="job_detail.html">Job Detail</a></li>
</ul>
</li>
<li class="menu_mm"><a href="blog_page.html">Blog</a></li>
<li class="menu_mm"><a href="about_us.html">About</a></li>
<li class="menu_mm"><a href="contact.html">Contact</a></li>
</ul>
</nav>
</div>
</header>



@elseif(Auth::User()->role == 'recruiter')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recruiter | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake; brand-image img-rounded elevation-3" src="{{ asset('admin/dist/img/moms.jpeg') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #F4A460;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> Account</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown " aria-labelledby="UserDropdown">
                <a class="dropdown-item"> 
                 <a href= "{{route('users.show', ['user' => auth()->user()->id])}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>&nbsp;&nbsp;&nbsp;My Profile 
                 </a>
                </a>
                <a class="dropdown-item">
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                </form>
                </a>
              </div>
            </li>
          </ul>  
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block ml-auto">
              <a class="nav-link" style="font-size:120%;"> <strong>Moms Postnatal Care </strong></a>
            </li>
          </ul>
  </nav>
@endif


@else

<!doctype html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<meta name="author" content="John Doe">
<meta name="description" content="">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Moms Postnatal Care</title>

<script src="{{ asset('applicant/js/4n2NXumNjtg5LPp6VXLlDicTUfA.js') }}"></script>
        <link rel="apple-touch-icon" href="{{ asset('applicant/images/apple-touch-icon.html') }}">
        <link rel="shortcut icon" type="image/ico" href="{{ asset('applicant/images/favicon.html') }}" />
        <link rel="stylesheet" href="{{ asset('applicant/css/bootstrap.min.css') }}">
        <link href="{{ asset('applicant/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('applicant/css/matrialize.css') }}" rel="stylesheet">
        <link href="{{ asset('applicant/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/style.css') }}">

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
         

    <script>
        $(document).ready(function(){

            $(window).scroll(function() {
                console.log('scrolled');
                console.log(window.pageYOffset);
            });

        });
    </script>

    <style>
      .special-image {
        border-radius: 50%;
    }
    </style>

</head>
<body>

<header class="header">

<div class="header_container background-color-orange-light">
<div class="container">
<div class="row">
<div class="col">
<div class="header_content d-flex flex-row align-items-center justify-content-start">
<div class="logo_container">
<img  class="special-image" src="{{ asset('applicant/imags/moms.png') }}" style="margin-right: 1rem;">
</div><div style="display:inline-block;">
<h3 class="font-color-white" style="font-size:160%;">
Moms Postnatal Care
      </h3>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">

<li><a href="{{route('ghome')}}">Home</a></li>
<li><a href="{{ route('gabout') }}">About Us</a></li>
<li><a href="{{ route('gcontact') }}">Contact</a></li>
<li><a href="{{route('vacancy')}}"> Job Vacancy</a></li>
</ul>
<div class=" Post-Jobs">
<a href="{{ route('login') }}" class="">Sign in</a>
</div>
<div class=" Post-Jobs">
<a href="{{ route('register') }}" class="">Register</a></div>
</div>
<div class="hamburger menu_mm menu-vertical">
<i class="large material-icons font-color-white menu_mm menu-vertical">menu</i>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
<div class="menu_close_container">
<div class="menu_close">
<div></div>
<div></div>
</div>
</div>
<div class="search">
<form action="#" class="header_search_form menu_mm">
<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
<i class="fa fa-search menu_mm" aria-hidden="true"></i>
</button>
</form>
</div>
<nav class="menu_nav">
<ul class="menu_mm">
<li class="dropdown menu_mm">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Home
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="index.html">Home 1</a></li>
<li><a href="index2.html">Home 2</a></li>
</ul>
</li>
<li class="dropdown menu_mm">
<a class="dropdown-toggle menu_mm" data-toggle="dropdown" href="#">Job
<span class="caret"></span></a>
<ul class="dropdown-menu menu_mm">
<li class="menu_mm"><a href="job_category.html">Job List</a></li>
<li class="menu_mm"><a href="job_detail.html">Job Detail</a></li>
</ul>
</li>
<li class="menu_mm"><a href="blog_page.html">Blog</a></li>
<li class="menu_mm"><a href="about_us.html">About</a></li>
<li class="menu_mm"><a href="contact.html">Contact</a></li>
</ul>
</nav>
</div>
</header>







@endauth
@endif


