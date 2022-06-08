@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')


<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-8 text-left" >
          <center><h2>Job Vacancy</h2></center>

            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Details</div>
                <div class="card-body">
   

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Position:</strong>
                        <input type="text" name="position" value="{{ $vacancy->position }}" class="form-control" readonly />
                      </div>
                      <div class="form-group">
                        <strong>Description:</strong>
                        {!! $vacancy->description !!}
                       </div>
                      <div class="form-group">
                        <strong>Requirement:</strong>
                        {!! $vacancy->requirement !!}
                      </div>
                      <div class="form-group">
                        <strong>Qualification:</strong>
                        {!! $vacancy->qualification !!}
                      </div>                    
                      <div class="form-group">
                        <strong>Status:</strong>
                        <input type="text" name="status" value="{{ $vacancy->status }}" class="form-control" readonly />
                      </div>
                      <div class="form-group">
                        <strong>Quantity:</strong>
                        <input type="number" min="0" onkeypress="return isNumberKey(event)" name="quantity" value="{{ $vacancy->quantity }}" class="form-control" readonly />
                      </div>
                      <div class="form-group">
                        <strong>Closing date:</strong>
                        <input type="text" name="date_close"  value="{{ $vacancy->date_close }}" class="form-control" readonly />
                      </div> 
                    
                    <div class="row">
                    <div class="col-12 d-flex justify-content-center  text-right">
                       <a class="btn btn-primary" href="{{ route('vacancies.index') }}"> Back</a>
        </div>
    </div>
    </div>
                   </div>
                  </div>
                </div>
              </div>
      
    <br><br><br>  

@endsection

@elseif(Auth::User()->role == 'applicant')
@include('partial.topbar')


<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
<h2 class="font-color-white">Job Details</h2>
<p class="font-color-white width-100"><a href="index.html" class="font-color-white">Home /</a><a href="Job_Category-2.html" class="font-color-white"> Job </a>/ Details
</p>
</div>
</div>
</div>
</section>

@foreach ($branches as $branch)
<section id="job-Details">
<div class="container background-color-full-white job-Details">
<div class="Exclusive-Product">
<h3> {{ $branch->position }} </h3>
<a href="{{ route('applications.view' , $branch->id) }}" class="Apply-Now">Apply Now</a>
<h6 class="font-color-orange">Closing date: {{ $branch->date_close }} </h6>
<a href="javascript:history.back()">Back</a>
<i class="material-icons">place</i>
<span class="text">{{ $branch->location }} </span>

<div class="Job-Description">
<h4>Description</h4><p>{!! $branch->description !!}</p>

<h4>Requirement</h4><p>{!! $branch->requirement  !!} </p>

<h4>Qualification</h4>
<p>{!! $branch->qualification !!}</p>

</div>
</div>
</div>
</section>
@endforeach
<section id="comment" class="background-color-full-white-light">
<div class="container">
<div class="max-width-80">
<h4>comment</h4>
<a href="#" class="Share">Share</a>
<div class="media border p-3">
<img src="imags/comment1.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
<div class="media-body">
<h6>Rehmatun Nisal</h6>
<p>Suspendisse augue pulvinar placerat himenaeos odio nec turpis augue sem maecenas, faucibus erat lacinia consectetur sapien suscipit vestibulum venenatis himenaeos.</p>
</div>
</div>
<div class="media border p-3 ">
<img src="imags/comment2.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
<div class="media-body">
<h6>Rehmatun Nisal</h6>
<p>Suspendisse augue pulvinar placerat himenaeos odio nec turpis augue sem maecenas, faucibus erat lacinia consectetur sapien suscipit vestibulum venenatis himenaeos.</p>
</div>
</div>
<div class="media border p-3 padding-none border-none">
<img src="imags/comment3.png" alt="John Doe" class="mr-3 rounded-circle imagess" style="width:60px;">
<div class="media-body">
<form>
<textarea placeholder="Type commeny" required></textarea>
<button class="Post">Post</button>
</form>
</div>
</div>
</div>
</div>
</section>





@endif


