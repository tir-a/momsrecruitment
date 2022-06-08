@if(Auth::User()->role == 'applicant')
@section('content')
@extends('experiences.table')
@endsection

@elseif(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')
@include('experiences.table')
@endsection

@endif