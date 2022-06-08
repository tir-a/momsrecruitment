@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4">
   <div class="col-xl-8">
    <h2>My Profile</h2>
        <div class="card mb-4">
              <div class="card-header">Account Details</div>
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                          {{ $user->name }}
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                       <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         {{ $user->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Branch</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @foreach ( $branch as $branch )
                                {{ $branch->location }}
                        @endforeach
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Manager</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        @foreach ( $manager as $manager )
                                {{ $manager->name }}
                        @endforeach
                        </div>
                    </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6 d-flex justify-content-right text-right">
                     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
                     <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>&nbsp;
                     <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                       @csrf
                       @method ('DELETE')
                     <button type="submit" class="btn btn-danger" >Delete</button>
                      </form>
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

<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<section id="Get-in-Touch">
<div class="container text-center position-absolute">
<div class="Get-in-Touch-box">
<div class="container">
<h3 class="text-left">My Profile</h3>
<div class="vertical-space-5"></div>
<p class="text-left">Account Details</p>

<div class="vertical-space-40"></div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Name" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="{{ $user->name }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Email" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="{{ $user->email }}" readonly />
</div>
</div>
</div>

@foreach ($applicant as $applicant)
@if ($applicant->gender==null and $applicant->date_of_birth==null and $applicant->address==null and $applicant->phone_number==null)
<section id="Blog">
<div class="row">
    <div class="col-lg-8 col-md-6">
     <div class="blog-box">
        <div class="text-left">
            <p>Profile Status: <span style="color: #ff0000; font-weight:bold;">Incomplete</span></p>
            <p>Please complete your <span style="font-weight:bold;">personal details</span></p>
        </div>
        </div>
    </div>
</section><br>
@endif

<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Gender" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="{{ $applicant->gender }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Birth Date" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="{{ $applicant->date_of_birth }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Address" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<textarea rows="4" cols="50"  class="form-control" placeholder="{{ $applicant->address }}" readonly /></textarea>
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Phone No" style="border:none" readonly />
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" placeholder="{{ $applicant->phone_number }}" readonly />
</div>
</div>
</div>
@endforeach

<div class="row">    
  <div class="col-6 d-flex justify-content-center text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>&nbsp;
      <form action="{{ route('users.destroy',$user->id) }}" method="POST">
           @csrf
           @method ('DELETE')
     <a> <button type="submit" class="btn btn-danger" >Delete</button></a>
        </form>
</div>
</div>

</div>
</div>
</section>
<div class="vertical-space-100"></div>
</section>

@endif