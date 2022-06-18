@if (Route::has('login'))
@auth

@if(Auth::User()->role == 'recruiter')

@extends('layouts.template')
@section('content')
@include('vacancies.table')
@endsection

@elseif(Auth::User()->role == 'applicant')

@include('vacancies.table')

@endif

@else
@include('vacancies.table')

@endauth
@endif
