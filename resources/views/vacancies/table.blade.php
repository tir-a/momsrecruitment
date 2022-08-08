@if (Route::has('login'))
@auth
@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')

@section('content')
<head>
<style>
#vacancies {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#vacancies td, #vacancies th {
  border: 1px solid #ddd;
  padding: 8px;
}

#vacancies tr:nth-child(even){background-color: #f2f2f2;}

#vacancies tr:hover {background-color: #ddd;}

#vacancies th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2C3E50;
  color: white;
}
td {
  text-align: center;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

</head>

  <body>
    <div class="row">
        <div class="col-lg-11 margin-tb">
            <div align="center" style="font-family: Verdana">
                <h2>List of Job Vacancies</h2>
            </div>
            @if ($branch!=null)
            <span style="margin-left:1063px;">
                <a class="btn btn-success" href="{{ route('vacancies.create') }}" > Add New Job Vacancy</a><br/>
            </span>
            @else
            <br>   
            <div class="col-xl-5">
             <div class="card mb-1">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <p>Branch location: <span style="color: #ff0000; font-weight:bold;">Not choosen</span></p>
                      <p>Please complete your <span style="font-weight:bold;">personal details</span> to add job vacancy</p>
                    </div>
                  </div>
                </div>
             </div>                 
            </div>
            @endif
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <center>
    <table class="table table-bordered"  id="vacancies"  class="display">
      <thead>
        <tr>
            <th class="text-center" style="font-family: Consolas">ID</th>
            <th class="text-center" style="font-family: Consolas">Position</th>
            <th class="text-center" style="font-family: Consolas">Status</th>
            <th class="text-center" style="font-family: Consolas">No of Availability</th>
            <th class="text-center" style="font-family: Consolas">Closing Date</th>
            <th class="text-center" style="font-family: Consolas" width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($branches as $branch)
        <tr>
            <td>{{ $branch->id }}</td>
            <td>{{ $branch->position }}</td>
            <td>{{ $branch->status }}</td>
            <td>{{ $branch->quantity }}</td>
            <td>{{ $branch->date_close }}</td>
            <td>
                <form action="{{ route('vacancies.destroy',$branch->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete? This action cannot be revert.')">
   
                  <a class="btn btn-info" href="{{ route('vacancies.show',$branch->id) }}">View</a>
    
                    <a class="btn btn-warning" href="{{ route('vacancies.edit',$branch->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table></center>
  </body>

  <script>
        $(document).ready( function () {
            $('#vacancies').DataTable();
        });
  </script>

    @include('sweetalert::alert')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   

@endsection


@elseif(Auth::User()->role == 'applicant')
@include('partial.topbar')

<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
<h2 class="font-color-white">Find Your Perfect role</h2>
</div>
</div>
</div>
</section>

<div id="search-box"  class="margin-none">
<div class="container search-box">
<form action="{{ url('/search') }}" method="get"  id="search-box_search_form_3" class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between ">
<div class="d-flex flex-row align-items-center justify-content-start inline-block">
<span class="large material-icons search">search</span>
<input class="search-box_search_input" placeholder="Search Job Vacancy" name="query" required="required" type="search">
<span class="large material-icons search">place</span>
<input class="search-box_search_input " placeholder="Location"  name="place" required="required" type="search">
</div>
<button type="submit" class="search-box_search_button">Search</button>
</form>
</div>
</div>

<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center" style="width:800px; margin:0 auto;">
<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-65"></div>

<div class="col-lg-12 col-md-12">
<h3 class="title">List of Job Vacancies</h3><br><br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@foreach ($vacancies as $v)
@if($v->status =='Available')
<div class="detail width-100">
<div class="media display-inline text-align-center">
<div class="media-body text-left text-align-center">
<h6><a href="#" class="font-color-black"> {{ $v->position }} </a></h6>
<i class="large material-icons">add_circle_outline</i>
<span class="text">  No of vacancies: {{ $v->quantity }} </span>
<br />
<i class="large material-icons">place</i>
<span class="text font-size"> Location: {{ $v-> location }}</span>
<div class="float-right margin-top text-align-center">
<a href="{{ route('vacancies.show' , $v->id)   }}" class="btn btn-info">View</a><br><br>
<p class="date-time">Closing date: {{ $v-> date_close }} </p>
</div>
</div>
</div>
</div> 
@endif
@endforeach 

<div class="float-left">
  Showing
    {{ $vacancies->firstItem() }}
  to
    {{ $vacancies->lastItem() }}
  of
    {{ $vacancies->total() }}
  entries
</div>

{{ $vacancies->links() }}


<div class="vertical-space-20"></div>
<div class="vertical-space-25"></div>
<div class="job-list width-100">
<ul class="pagination justify-content-end margin-auto">
<li class="page-item"><a class="page-link pdding-none" href="{{ $vacancies->previousPageUrl() }}"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
<li class="page-item"><a class="page-link" href="{{ $vacancies->previousPageUrl() }}">1</a></li>
<li class="page-item"><a class="page-link" href="{{ $vacancies->nextPageUrl() }}">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
<li class="page-item">
<a class="page-link pdding-none" href="{{ $vacancies->nextPageUrl() }}"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>
@include('partial.footer')




@endif

@else

@include('partial.topbar')

<section id="intro">
<div class="carousel-item active">
<div class="carousel-background"><img src="{{ asset('applicant/imags/slider/slider1.jpg') }}" alt=""></div>
<div class="carousel-container">
<div class="carousel-content">
<h2 class="font-color-white">Find Your Perfect role</h2>
</div> 
</div>
</div>
</section>

<div id="search-box"  class="margin-none">
<div class="container search-box">
<form action="#" id="search-box_search_form_3" class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between ">
<div class="d-flex flex-row align-items-center justify-content-start inline-block">
<span class="large material-icons search">search</span>
<input class="search-box_search_input" placeholder="Search Keyword" required="required" type="search">
<span class="large material-icons search">place</span>
<input class="search-box_search_input " placeholder="Location" required="required" type="search">
</div>
<button type="submit" class="search-box_search_button">Search Jobs</button>
</form>
</div>
</div>

<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center" style="width:800px; margin:0 auto;">
<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-55"></div>

<div class="col-lg-12 col-md-12">
<h3 class="title">Job Vacancy List</h3><br><br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@foreach ($vacancies as $v)
@if($v->status =='Available')
<div class="detail width-100">
<div class="media display-inline text-align-center">
<div class="media-body text-left text-align-center">
<h6><a href="#" class="font-color-black"> {{ $v->position }} </a></h6>
<i class="large material-icons">add_circle_outline</i>
<span class="text">  No of vacancies: {{ $v->quantity }} </span>
<br />
<i class="large material-icons">place</i>
<span class="text font-size"> Location: {{ $v-> location }}</span>
<div class="float-right margin-top text-align-center">
<a href="{{ route('showvacancy' , $v->id)   }}" class="btn btn-info">View</a><br><br>
<p class="date-time">Closing date: {{ $v-> date_close }} </p>
</div>
</div>
</div>
</div>
@endif
@endforeach 

<div class="float-left">
  Showing
    {{ $vacancies->firstItem() }}
  to
    {{ $vacancies->lastItem() }}
  of
    {{ $vacancies->total() }}
  entries
</div>

{{$vacancies->links()}}

<div class="vertical-space-60"></div>
</section>

@endauth

@endif


