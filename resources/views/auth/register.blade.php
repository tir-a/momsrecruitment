@extends('layouts.app')

@section('content')



<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('log/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/main.css') }}">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(log/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Register
					</span>
				</div>
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                        @csrf
			
                        <div class="wrap-input80 validate-input m-b-26" data-validate="Role is required" style="width:600px; margin:0 auto;">
                        <span class="label-input100">Role</span>

                            <div class="form-check form-check-inline">
                                <input id="recruiter" type="radio" style="vertical-align: baseline; height:45px; width:20px;" class="form-control @error('role') is-invalid @enderror" name="role" value="recruiter" checked>
								<label for="recruiter" style="font-size: 15px">Recruiter</label><br>						
								<span class="focus-input100"></span>
								</div>
                                <div class="form-check form-check-inline">
                                <input id="applicant" type="radio" style="vertical-align: baseline; height:45px; width:20px;" class="form-control @error('role') is-invalid @enderror" name="role" value="applicant">
                                <label for="applicant" style="font-size: 15px">Applicant</label><br>				
								<span class="focus-input100"></span>
                                </div>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        

					<div class="wrap-input80 validate-input m-b-26" data-validate="Name is required" style="width:600px; margin:0 auto;">
                        <span class="label-input100">Name</span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						<span class="focus-input100"></span>
                        
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
                    <br>            

                    <div class="wrap-input80 validate-input m-b-26" data-validate="Email is required" style="width:600px; margin:0 auto;">
                        <span class="label-input100">Email</span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						<span class="focus-input100"></span>
                        
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
                    <br>            

					<div class="wrap-input80 validate-input m-b-18" data-validate = "Password is required" style="width:600px; margin:0 auto;">
                        <span class="label-input100">Password</span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
						<span class="focus-input100"></span>
                        
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

                    <br>            
					<div class="wrap-input80 validate-input m-b-18" data-validate = "Confirm Password is required" style="width:600px; margin:0 auto;">
                        <span class="label-input100">Confirm Password</span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						<span class="focus-input100"></span>
                        <br>           
					</div>       
     
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>
					<br><br>
					<div class="wrap-input80 validate-input m-b-18"><br>
					Already have an account?<a class="btn btn-link" href="{{ route('login')}}">Sign in here</a>
					</div>  

				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('log/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('log/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('log/js/main.js') }}"></script>

</body>
</html>

@endsection
