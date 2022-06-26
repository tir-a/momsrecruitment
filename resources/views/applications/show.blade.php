@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
        <div class="col-xl-12 text-left" >
          <center><h2>Job Application Information</h2></center>
           <div class="card mb-4">

           @foreach ($applications as $applications)

           <div class="card-header">Application Details</div>
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">     
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="level">Position:</label><br>
                            <input type="text" class="form-control" id="position" name="position" value="{{ $applications->position }}" readonly />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="certificate">Applied Date:</label>
                            <input type="text" class="form-control" id="date_apply" name="date_apply" value="{{ $applications->date_apply }}" readonly />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="level">Resume:</label><br>
                          <a href="{{ asset('/file/'.$applications->resume) }}" target="_blank"> {{  $applications->resume  }}</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="certificate">Status:</label>
                            <input type="text" class="form-control" id="app_status" name="app_status" value="{{ $applications->app_status }}" readonly  />
                        </div>
                      </div>
                    </div>
                   </div>
                      
                   </div>
                  </div>
                </div>

                <div class="card mb-4">
                <div class="card-header">Profile Details</div>
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">     
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="level">Name:</label><br>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $applications->name }}" readonly />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="certificate">Email:</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ $applications->email }}" readonly />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="level">Gender:</label><br>
                          <input type="text" class="form-control" id="gender" name="gender" value="{{ $applications->gender }}" readonly  />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="certificate">Date of Birth:</label>
                          <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $applications->date_of_birth }}" readonly  />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="level">Phone Number:</label><br>
                          <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $applications->phone_number }}" readonly  />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="certificate">Address:</label>
                          <textarea rows="4" cols="50"  class="form-control" name="address" readonly />{{ old('address', $applications->address) }}</textarea>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>

                   </div>
                  </div>

                <div class="card mb-4">
                <div class="card-header">Education Details</div>               
                   @foreach ($applicants as $applications)
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">     
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="certificate">Qualification:</label>
                        <input type="text" class="form-control" id="certificate" name="certificate" value="{{ $applications->certificate }}" readonly />                        
                      </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="level">Institution:</label><br>
                        <input type="text" class="form-control" id="institution" name="institution" value="{{ $applications->institution }}" readonly  />                       
                       </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="certificate">Graduation Date:</label>
                        <input type="text" class="form-control" id="grad_date" name="grad_date" value="{{ $applications->grad_date }}" readonly  />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="level">CGPA:</label><br>
                        <input type="text" class="form-control" id="grade" name="grade" value="{{ $applications->grade }}" readonly  />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="certificate">Field of Study:</label>
                        <input type="text" class="form-control" id="field_study" name="field_study" value="{{ $applications->field_study }}" readonly  />                        
                      </div>
                      </div>
                    </div>
                    </div>
                    </div>
                   </div>                    
                   @endforeach
                  </div>

                  @foreach ($experiences as $applications)
                <div class="card mb-4">              
                <div class="card-header">Experience Details</div>
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">     
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="job">Position:</label>
                        <input type="text" class="form-control" id="job" name="job" value="{{ $applications->job }}" readonly />                                      
                      </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="job_level">Position Level:</label><br>
                        <input type="text" class="form-control" id="job_level" name="job_level" value="{{ $applications->job_level }}" readonly  />                       
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="specialization">Specialization:</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $applications->specialization }}" readonly  />
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="company">Company:</label><br>
                        <input type="text" class="form-control" id="company" name="company" value="{{ $applications->company }}" readonly  />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="date_joined">Date Joined:</label>
                        <input type="text" class="form-control" id="date_joined" name="date_joined" value="{{ $applications->date_joined }}" readonly  />                        
                      </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="working_year">Years in Position:</label><br>
                        <input type="text" class="form-control" id="working_year" name="working_year" value="{{ $applications->working_year }}" readonly  />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label for="detail">Detail:</label>
                        <textarea rows="4" cols="50"  class="form-control" name="detail" readonly />{{ old('detail', $applications->detail) }}</textarea>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>
                   </div>
                  </div>
                  </div>
                  @endforeach

                      <div class="row">
                        <div class="col-12 d-flex justify-content-center  text-right">
                        <a class="btn btn-primary" href="{{ route('applications.index') }}"> Back</a>
                        </div>
                      </div>
                      @endforeach

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
            <h3><strong>Job Application Details</strong></h3>
        </div>
    </div>
</div>
@foreach ($applications as $applications)
<div class="vertical-space-60"></div>
<div class="job-post-box">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Position Applied" style="border:none" readonly />
<input type="text" class="form-control" id="position" name="position" value="{{  $applications->position  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Location" style="border:none" readonly />
<input type="text" class="form-control" id="location" name="location" value="{{  $applications->location  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Date" style="border:none" readonly />
<input type="text" class="form-control" id="date_apply" name="date_apply" value="{{  $applications->date_apply  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Application Status" style="border:none" readonly />
<input type="text" class="form-control" id="app_status" name="app_status" value="{{  $applications->app_status  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Resume" style="border:none" readonly />
<div class="col-lg-6 col-md-6">
<a href="{{ asset('/file/'.$applications->resume) }}" target="_blank"> {{  $applications->resume  }}</a>
</div>
</div>
</div>
</div>
<br><br>

<div class="row">    
  <div class="col-6 d-flex text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     @if ($applications->app_status=="Pending")
      <form action="{{ route('applications.destroy',$applications->id) }}" method="POST">
           @csrf
           @method ('DELETE')
     <a> <button type="submit" class="btn btn-danger" >Delete</button></a>
     </form>
     @endif
     @endforeach
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')

@endif