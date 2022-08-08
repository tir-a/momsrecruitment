@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

   
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

        <div class="container-xl px-4 mt-4">
          <div class="col-xl-8">
           <h2>Edit Profile</h2>

            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Account Details</div>
                <div class="card-body">
                  <form action="{{ route('users.update',$user->id) }}" method="POST" onsubmit="return submitForm(this);">
                     @csrf
                      @method('PUT')
   
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ Auth::user()->name }}" required>
                            </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address</label>
                            <input class="form-control" id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                       <!--     <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password" value="{{ Auth::user()->password }}" required>
                            </div>
                        -->
                            <div class="col-md-6">
                                 <label class="small mb-1" for="location">Branch</label>
                                 <select class="form-control" name="branch_id" required>
                                     <option value="">-- Choose Branch --</option>
                                         @foreach ($branch as $branch)
                                    <option value="{{$branch->id}}" {{ ( Auth::user()->recruiter->branch_id == $branch->id ) ? "selected" : "" }}> {{$branch->location}}</option>
                                         @endforeach
                                 </select>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="id">Manager</label>
                                <select class="form-control" name="manager_id">
                                     <option value="">-- Choose Manager --</option>
                                         @foreach ($manager as $manager)
                                     <option value="{{$manager->id}}" {{ ( Auth::user()->recruiter->manager_id == $manager->id ) ? "selected" : "" }}> {{$manager->name}} - {{$manager->location}}</option>
                                         @endforeach
                                </select>
                            </div>
                            </div>      
                            <button class="btn btn-success" type="submit">Save changes</button>
                        <a class="btn btn-primary" href="javascript:history.back()"> Back</a>
                     </form>
    
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>

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

@endsection

@elseif(Auth::User()->role == 'applicant')
@include('partial.topbar')
    
<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<section id="Get-in-Touch">
<div class="container text-center position-absolute">
<div class="Get-in-Touch-box">
<h3 class="text-left">My Profile</h3>
<div class="vertical-space-5"></div>
<p class="text-left">Account Details</p>
<div class="vertical-space-40"></div>

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
    
<form action="{{ route('users.update',$user->id) }}" method="POST" onsubmit="return confirm('Are you sure want to submit?')">
@csrf
@method('PUT')
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Name" style="border:none">
</div>
</div>                            
<input class="form-control" id="role" type="hidden" name="role" value="{{ Auth::user()->role }}">
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Email" style="border:none" >
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
</div>
</div>
</div>        
@foreach ($applicant as $applicant )
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Gender" style="border:none" >
</div>
</div>&nbsp;&nbsp;&nbsp;&nbsp;
<div class="form-group form-check form-check-inline ">
            <input class="form-check-input" type="radio" name="gender" id="Male" 
              value="Male" checked />
                <label class="form-check-label" for="Male">Male</label>&nbsp;&nbsp;
                 <input class="form-check-input" type="radio" name="gender" id="Female"
              value="Female" />
          <label class="form-check-label" for="Female">Female</label>
       </div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Birth Date" style="border:none" >
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="date" class="form-control" name="date_of_birth" value="{{ $applicant->date_of_birth }}" required>
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Address" style="border:none">
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<textarea rows="4" cols="50"  class="form-control" name="address" required>{{ old('address', $applicant->address) }}</textarea>
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-2 col-md-8">
<div class="form-group">
<input type="text" class="form-control" placeholder="Phone No" style="border:none" >
</div>
</div>
<div class=" col-lg-6 col-md-12">
<div class="form-group">
<input type="text" class="form-control" name="phone_number" value="{{ $applicant->phone_number }}" required>
</div>
</div>
</div>  
@endforeach
<div class="row">
  <div class="col-lg-7 col-md-8">
    <a> <button class="btn btn-success" type="submit">Save changes</button></a>
    <a class="btn btn-primary" href="javascript:history.back()"> Back</a>
  </div>
</div>
</form>
</div>
</div>

<div class="vertical-space-100"></div>
</section>

@endif
