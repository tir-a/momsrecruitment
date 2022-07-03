@if(Auth::User()->role == 'applicant')

@include('partial.topbar')


<style>.element::-webkit-input-placeholder {
    color: black;
    font-weight: 800;
}</style>

<br><br><br><br><br><br><br>

<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center" style="width:800px; margin:0 auto;">
<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-55"></div>

<div class="col-lg-12 col-md-12">
<h3 class="text-left">Interviews</h3>
<div class="vertical-space-5"></div>
<br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@foreach ($interviews as $iv)

<div class="detail width-100">
<div class="media display-inline text-align-center">
<div class="media-body text-left text-align-center">
<h6><a href="#" class="font-color-black"> </a></h6>
<i class="large material-icons">account_balance</i>
<span class="text">  Position: {{ $iv -> position }} </span>
<br /><br>
<i class="large material-icons">assignment</i>
<span class="text font-size"> Date:  {{ $iv -> date }} </span>
<div class="float-right margin-top text-align-center">
<a href="{{ route('interviews.show' , $iv->id)  }}" class="btn btn-primary">View</a><br><br>
</div>
</div>
</div>
</div>
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

@include('partial.footer')


@elseif(Auth::User()->role == 'recruiter')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')

<style>
#interviews {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#interviews td, #applications th {
  border: 1px solid #ddd;
  padding: 8px;
}

#interviews tr:nth-child(even){background-color: #f2f2f2;}

#interviews tr:hover {background-color: #ddd;}

#interviews th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#2C3E50;
  color: white;
}
td {
  text-align: center;
}

</style>

<body>
<div class="row">
        <div class="col-lg-11 margin-tb">
        <div align="center" style="font-family: Verdana">
                <h2>List of Interviews</h2>
            </div>
            <div class="pull-right">
              <span style="margin-left:1075px;">
                <a class="btn btn-success" href="{{ route('interviews.create') }}" > Add New Interview</a><br/>
              </span>
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
    <table class="table table-bordered"  id="interviews">
      <thead>
        <tr>
            <th class="text-center" style="font-family: Consolas">Vacancy ID</th>
            <th class="text-center" style="font-family: Consolas">Application ID</th>
            <th class="text-center" style="font-family: Consolas">Date</th>
            <th class="text-center" style="font-family: Consolas">Time</th>
            <th class="text-center" style="font-family: Consolas">Confirmation Status</th>
            <th class="text-center" style="font-family: Consolas" width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($interviews as $iv)
        <tr>
            <td>{{ $iv->v_id }}</td>
            <td>{{ $iv->app_id}}</td>
            <td>{{ $iv->date}}</td>
            <td>{{ $iv->time}}</td>
            <td>{{ $iv->confirmation}}</td>
            <td>
            <form action="{{ route('interviews.destroy',$iv->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('interviews.show',$iv->id) }}">View</a>
    
                <a class="btn btn-warning" href="{{ route('interviews.edit',$iv->id) }}">Edit</a>
 
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
            </td>
        </tr>
       </tbody>
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
@push('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#interviews').DataTable();
        });
    </script>
@endpush
@endif
