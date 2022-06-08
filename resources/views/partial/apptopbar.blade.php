<!doctype html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<meta name="author" content="John Doe">
<meta name="description" content="">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jobz-index</title>

<script src="{{ asset('applicant/js/4n2NXumNjtg5LPp6VXLlDicTUfA.js') }}"></script>
        <link rel="apple-touch-icon" href="{{ asset('applicant/images/apple-touch-icon.html') }}">
        <link rel="shortcut icon" type="image/ico" href="{{ asset('applicant/images/favicon.html') }}" />
        <link rel="stylesheet" href="{{ asset('applicant/css/bootstrap.min.css') }}">
        <link href="{{ asset('applicant/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('applicant/css/matrialize.css') }}" rel="stylesheet">
        <link href="{{ asset('applicant/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('applicant/css/style.css') }}">
</head>
<body>

<header class="header">

<div class="header_container background-color-orange-light">
<div class="container">
<div class="row">
<div class="col">
<div class="header_content d-flex flex-row align-items-center justify-content-start">
<div class="logo_container">
<a href="index.html">
<img src="{{ asset('applicant/imags/moms.png') }}" style="margin-right: 1rem;"  class="brand-image img-rounded elevation-3" alt="">
</a>
</div>
<nav class="main_nav_contaner ml-auto">
<ul class="main_nav">
<li><a href="blog_page.html">Home</a></li>
<li><a href="about_us.html">About</a></li>
<li><a href="blog_page.html"> Job Vacancy</a></li>
<li class="dropdown active ">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li>    
    <a href= "{{route('users.show', ['user' => auth()->user()->id])}}" class="nav-link">
    <i class="nav-icon fas fa-user"></i>  Profile</a></li>
<li><a href="index2.html"> Education</a></li>
<li><a href="index2.html"> Experience</a></li>
<li><a href="index2.html"> Job Application</a></li>
<li>
<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i> Logout 
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
