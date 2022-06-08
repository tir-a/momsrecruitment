@if(Auth::User()->role == 'applicant')
@section('content')
@extends('applications.table')
@endsection

@elseif(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')
@include('applications.table')
@endsection

@endif