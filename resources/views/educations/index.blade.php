@if(Auth::User()->role == 'applicant')
@section('content')
@extends('educations.table')
@endsection

@elseif(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')
@include('educations.table')
@endsection

@endif