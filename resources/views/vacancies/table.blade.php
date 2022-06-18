@if (Route::has('login'))
@auth
@if(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

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
  background-color: #B0C4DE;
  color: white;
}
td {
  text-align: center;
}

</style>

<body>
<div class="row">
        <div class="col-lg-11 margin-tb">
        <div align="center" style="font-family: Calibri">
                <h2>List of Job Vacancies</h2>
            </div>
            <div class="pull-right" align="right">
                <a class="btn btn-success" href="{{ route('vacancies.create') }}" > Add New Job Vacancy</a><br/>
            </div>
        </div>
    </div>
   <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <center>
    <table class="table table-bordered"  id="vacancies" style="width: 84%;">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Position</th>
            <th class="text-center">Status</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Closing Date</th>
            <th class="text-center" width="280px">Action</th>
        </tr>
        @foreach ($branches as $branch)
        <tr>
            <td>{{ $branch->id }}</td>
            <td>{{ $branch->position }}</td>
            <td>{{ $branch->status }}</td>
            <td>{{ $branch->quantity }}</td>
            <td>{{ $branch->date_close }}</td>
            <td>
                <form action="{{ route('vacancies.destroy',$branch->id) }}" method="POST">
   
                  <a class="btn btn-info" href="{{ route('vacancies.show',$branch->id) }}">View</a>
    
                    <a class="btn btn-primary" href="{{ route('vacancies.edit',$branch->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <a href="#" class="btn btn-danger delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table></center>
    </body>
    @include('sweetalert::alert')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $('.delete').click(function(){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to revert this action!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Data has been deleted", {
                icon: "success",
                });
            } else {
                swal("Cancelled");
            }
            });
    });
    </script>

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
<a href="{{ route('vacancies.show' , $v->id)   }}" class="btn btn-info">View</a><br><br>
<p class="date-time">Closing date: {{ $v-> date_close }} </p>
</div>
</div>
</div>
</div>
@endif
@endforeach 

<div class="vertical-space-20"></div>
<div class="vertical-space-25"></div>
<div class="job-list width-100">
<ul class="pagination justify-content-end margin-auto">
<li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
<li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
<li class="page-item">
<a class="page-link pdding-none" href="javascript:void(0);"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>



@endif

@else


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
<a href="{{ route('vacancies.show' , $v->id)   }}" class="btn btn-info">View</a><br><br>
<p class="date-time">Closing date: {{ $v-> date_close }} </p>
</div>
</div>
</div>
</div>
@endif
@endforeach 

<div class="vertical-space-20"></div>
<div class="vertical-space-25"></div>
<div class="job-list width-100">
<ul class="pagination justify-content-end margin-auto">
<li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
<li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
<li class="page-item">
<a class="page-link pdding-none" href="javascript:void(0);"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>
@endauth

@endif


