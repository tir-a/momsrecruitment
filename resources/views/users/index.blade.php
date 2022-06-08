@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')


@elseif(Auth::User()->role == 'applicant')
@include('layouts.homeapp')

@section('content')
@include('users.show')
@endsection

@endif


