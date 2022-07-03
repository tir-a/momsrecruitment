@if (Route::has('login'))
@auth

@if(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')


<style type="text/css">


#box1, #box2{
	width:200px;
	height:200px;
	margin:10px;
	padding:10px;
}

#box1 {
	background:#9FE2BF;
}

#box2 {
	background:#40E0D0;
}


#box1 p, #box2 p {
	white-space:pre;
	font-size:smaller;
	font-family:monospace;
}
</style>
</head>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary mb1 bg-maroon">
              <div class="inner">
                <h3> {{$vacancies}} </h3>

                <p>Job Vacancies</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <a href="{{route('vacancies.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary mb1 bg-blue">
              <div class="inner">
                <h3> {{$applications}} </h3>

                <p>Job Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{route('applications.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary mb1 bg-navy">
              <div class="inner">
                <h3> {{$applications}} </h3>

                <p>Interviews</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="{{route('interviews.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
</section>


@endsection

@elseif(Auth::User()->role == 'applicant')

@include('layouts.homeapp')

@section('content')

@endsection

@endif


@else

@include('layouts.homeapp')

@section('content')

@endsection

@endauth

@endif
