@section('content')
<head>
<style>

</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

</head>
<body>
<div class="row">
        <div class="col-lg-11 margin-tb">
            <div align="center" style="font-family: Calibri">
                <h2>List of Branches</h2>
            </div>
            <div class="pull-right">
            <span style="margin-left:810px;">
                <a class="btn btn-success" href="{{ route('branches.create') }}" > Add New Branch</a><br/>
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
    <table class="table table-bordered"  id="branches" >
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Location</th>
            <th class="text-center" width="280px">Action</th>
        </tr>
        @foreach ($branches as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->location }}</td>
            <td>
                <form action="{{ route('branches.destroy',$b->id) }}" method="POST">
   
                  <a class="btn btn-primary mb1 bg-gray" href="{{ route('branches.show',$b->id) }}">View</a>
    
                    <a class="btn btn-primary mb1 bg-blue" href="{{ route('branches.edit',$b->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <a href="#" class="btn btn-danger delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table></center><br><br>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
	$(document).ready(function() {
    	$('#branches').DataTable();
	});
</script>
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
