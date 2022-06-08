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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Job Applications</span>
                <span class="info-box-number">
                
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Available Vacancies</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </div>        
        </div>

        
</section>


@endsection

@elseif(Auth::User()->role == 'applicant')

@include('layouts.homeapp')

@section('content')

@endsection
@endif


