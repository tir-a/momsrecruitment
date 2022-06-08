@if(Auth::User()->role == 'applicant')
@section('content')
@extends('interviews.table')
@endsection

@elseif(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')
@include('interviews.table')
@endsection

@endif