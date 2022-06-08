@include('partial.topbar')

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


<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
 <h2 class="font-color-white">Join Us Now</h2>
 <center><a href="{{route('vacancies.index')}}" class="Explore-Jobs">Explore Jobs</a></center>
</div>
</div>
</div>
</section>

<div id="search-box">
<div class="container search-box">
<form action="#" id="search-box_search_form_3" class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between ">
<div class="d-flex flex-row align-items-center justify-content-start inline-block">
<span class="large material-icons search">search</span>
<input class="search-box_search_input" placeholder="Search Keyword" required="required" type="search">
<span class="large material-icons search">place</span>
<input class="search-box_search_input " placeholder="Location" required="required" type="search">
</div>
<button type="submit" class="search-box_search_button">Search Jobs</button>
</form>
</div>
</div>

<section id="Job-Category">
<div class="container">
<h3 class="text-center">Let's Grow Together</h3>
<div class="vertical-space-30"></div>
</div>
</section>
<section id="v2-Jobtend">
<div class="container">
<div class="vertical-space-100"></div>
<div class="row">
<div class="col-lg-9 col-md-12 ">
<h3 class="title-jobted title font-color-white">Why Choose Us</h3>
<div class="vertical-space-20"></div>
<p class="max-width font-color-white">We help you achieve your dreams
</p>
<div class="vertical-space-40"></div>
<ul class="max-width font-color-white">
<li class="list-item1 ">We care for our employees
</li>
<li class="list-item1 ">Best Team and Support </li>
<li class="list-item1 ">Improve skills and knowledge</li>
</ul>
</div>
<div class="col-lg-3 col-md-12 align-self-center">
<a href="#" data-toggle="modal" data-target="#myModal" class="display-flex">
</a>
</div>
<div class="vertical-space-80"></div>
</div>
</div>
</section>

<div class="vertical-space-60"></div>
</section>

@include('partial.footerguest')