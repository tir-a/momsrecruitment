@if (Route::has('login'))
@auth

@if(Auth::User()->role == 'applicant')
@include('partial.topbar')

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
@include('sweetalert::alert')

</section>


<div class="vertical-space-60"></div>
</section>

</div>

@include('partial.footer')

<div class="modal" id="myModal">
<div class="container">
<div class="vertical-space-85"></div>
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-body">
<button class="button button-rounded  close" data-dismiss="modal">&times;</button>
</div>
</div>
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endif

@else
@include('partial.topbar')

<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
<h2 class="font-color-white">Join Us Now</h2>
<center><a href="{{route('vacancy')}}" class="Explore-Jobs">Explore Jobs</a></center>

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

@include('partial.footer')

<div class="modal" id="myModal">
<div class="container">
<div class="vertical-space-85"></div>
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-body">
<button class="button button-rounded  close" data-dismiss="modal">&times;</button>
</div>
</div>
</div>
</div>

@endauth

@endif