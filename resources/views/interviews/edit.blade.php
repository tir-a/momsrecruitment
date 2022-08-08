@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-8 text-left" >
          <center><h2>Update Interview</h2></center>

            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Details</div>
                <div class="card-body">
               
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    @foreach ($interview as $interview)

<form action="{{ route('interviews.update',$interview->id) }}" method="POST" onsubmit="return submitForm(this);">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
               <strong>Application ID:</strong>
               <input type="text" class="form-control" name="application_id" value="{{ $interview->app_id }}" readonly/>
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" name="date" value="{{ $interview->date }}" required>
            </div>
            <div class="form-group">
                <strong>Time:</strong>
                <input type="time" class="form-control" name="time" value="{{ $interview->time }}" required>
            </div>
            <div class="form-group">
                <strong>Zoom Platform:</strong>
                <input type="url" class="form-control" name="platform" value="{{ $interview->platform }}" required>
            </div>
            <div class="form-group">
                <strong>Confirmation Status:</strong>
                <input type="text" class="form-control" name="confirmation" value="{{ $interview->confirmation }}" readonly/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('interviews.index') }}"> Back</a>
        </div>
    </div>   

</form> @endforeach

</div></div>
</div>
</div>
</div>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function submitForm(form) {
        swal({
            title: "Are you sure?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                form.submit();
            }
        });
        return false;
    }
    </script>

<br><br>

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

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<div class="vertical-space-60"></div>
<div class="job-post-box">        
@foreach ($interview as $interview)
<form action="{{ route('interviews.update',$interview->id) }}" method="POST" onsubmit="return confirm('Are you sure want to submit?')">
        @csrf
        @method('PUT')

<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group"> 
<label for="position">Position Applied</label>
<input type="text" class="form-control" id="position" name="position" value="{{  $interview->position  }}" readonly/>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="confirmation">Confirmation Status</label>
<select class="form-control" id="confirmation" name="confirmation">
            <option  value="{{  $interview->confirmation }}">Choose Status</option>
            <option value="Attend">Attend</option>
            <option value="Unavailable">Unavailable</option>
      </select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="date">Date</label>
<input type="text" class="form-control" id="date" name="date" value="{{  $interview->date  }}" readonly/>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="time">Time</label>
<input type="text" class="form-control" id="time" name="time" value="{{  $interview->time  }}" readonly/>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-10 col-md-8">
<div class="form-group">
<label for="platform">Zoom Platform</label>
<div class="col-lg-10 col-md-8">
<a href="{{ $interview->platform  }}" target="_blank"> {{ $interview->platform   }}</a>
</div>
</div>
</div>
</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
                <a><button type="submit" class="btn btn-success">Submit</button></a>
                <a class="btn btn-primary" href="{{ route('interviews.index') }}"> Back</a>
      </div>  
</form>  
@endforeach
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')


@endif
