@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')


<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-8 text-left" >
          <center><h2>Interview</h2></center>

            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Details</div>
                <div class="card-body">
   
                @foreach ($interviews as $interviews)

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Application ID:</strong>
                        <input type="text" name="application_id"  value="{{ $interviews->app_id }}" class="form-control" readonly />
                      </div> 
                      <div class="form-group">
                        <strong>Date:</strong>
                        <input type="date" class="form-control" name="date" value="{{ $interviews->date }}" readonly />
                      </div>
                      <div class="form-group">
                        <strong>Time:</strong>
                        <input type="time" class="form-control" name="time" value="{{ $interviews->time }}" readonly />
                       </div>
                      <div class="form-group">
                        <strong>Confirmation Status:</strong>
                        <input type="text" name="status" value="{{ $interviews->confirmation }}" class="form-control" readonly />
                      </div>
                      @endforeach

                <div class="row">
                  <div class="col-12 d-flex justify-content-center  text-right">
                       <a class="btn btn-primary" href="{{ route('interviews.index') }}"> Back</a>
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


<section id="post_job">
<div class="vertical-space-40"></div>
<div class="vertical-space-101"></div>
<div class="container">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3><strong>Interview Details</strong></h3>
        </div>
    </div>
</div>
@foreach ($interviews as $interviews)

<div class="vertical-space-40"></div>
<div class="job-post-box">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Position Applied" style="border:none" readonly />
<input type="text" class="form-control" id="position" name="position" value="{{  $interviews->position  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Date" style="border:none" readonly />
<input type="text" class="form-control" id="date" name="date" value="{{  $interviews->date  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Time" style="border:none" readonly />
<input type="text" class="form-control" id="time" name="time" value="{{  $interviews->time  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Confirmation Status" style="border:none" readonly />
<input type="text" class="form-control" id="confirmation" name="confirmation" value="{{  $interviews->confirmation  }}" readonly />
</div>
</div>
</div>  
<div class="row">    
  <div class="col-6 d-flex text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     <a class="btn btn-primary" href="{{ route('interviews.edit',$interviews->id) }}">Edit</a>&nbsp;
  </div>
</div>
@endforeach
</div>
</div>
</div>
</section><br><br>

@endif


