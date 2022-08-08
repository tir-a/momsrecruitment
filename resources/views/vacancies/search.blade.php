@if(Auth::User()->role == 'applicant')
@include('partial.topbar')

<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
<h2 class="font-color-white">Find Your Perfect role</h2>
</div>
</div>
</div>
</section>

<div id="search-box"  class="margin-none">
<div class="container search-box">
<form action=" {{ url('/search') }} " type="get" name="query" id="search-box_search_form_3" class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between ">
<div class="d-flex flex-row align-items-center justify-content-start inline-block">
<span class="large material-icons search">search</span>
<input class="search-box_search_input" placeholder="Search Keyword" required="required" type="search">
<!--<span class="large material-icons search">place</span>
<input class="search-box_search_input " placeholder="Location" required="required" type="search">-->
</div>
<button type="submit" class="search-box_search_button">Search Jobs</button>
</form>
</div>
</div>

<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center" style="width:800px; margin:0 auto;">
<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-65"></div>

<div class="col-lg-12 col-md-12">
<h3 class="title">List of Job Vacancies</h3><br><br>



@foreach ($vacancies as $v)
<div class="detail width-100">
<div class="media display-inline text-align-center">
<div class="media-body text-left text-align-center">
<h6><a href="#" class="font-color-black"> {{ $v->position }} </a></h6>
<i class="large material-icons">add_circle_outline</i>
<span class="text">  No of vacancies: {{ $v->quantity }} </span>
<br />
<i class="large material-icons">place</i>
<span class="text font-size"> Location: {{ $v-> location }}</span>
<div class="float-right margin-top text-align-center">
<a href="" class="btn btn-info">View</a><br><br>
<p class="date-time">Closing date: {{ $v-> date_close }} </p>
</div>
</div>
</div>
</div>
@endforeach 

<div class="vertical-space-20"></div>
<div class="vertical-space-25"></div>
<div class="job-list width-100">
<ul class="pagination justify-content-end margin-auto">
<li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
<li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
<li class="page-item">
<a class="page-link pdding-none" href="javascript:void(0);"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>


@endif