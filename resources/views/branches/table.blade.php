@section('content')

<head>
<style>
#branches {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#branches td, #branches th {
  border: 1px solid #ddd;
  padding: 8px;
}

#branches tr:nth-child(even){background-color: #f2f2f2;}

#branches tr:hover {background-color: #ddd;}

#branches th {
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
                <h2>List of Branches</h2>
            </div>
            <div class="pull-right">
            <span style="margin-left:1075px;">
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
    <table class="table table-bordered"  id="branches"  class="display">
      <thead>
        <tr>
            <th class="text-center" style="font-family: Consolas">Location</th>
            <th class="text-center" style="font-family: Consolas" width="280px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($branches as $b)
        <tr>
            <td>{{ $b->location }}</td>
            <td>
                <form action="{{ route('branches.destroy',$b->id) }}" method="POST"  onsubmit="return confirm('Are you sure want to delete? This action cannot be revert.')">
   
                  <a class="btn btn-info" href="{{ route('branches.show',$b->id) }}">View</a>
                
                    <a class="btn btn-warning" href="{{ route('branches.edit',$b->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
 
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
       </tbody>
    </table>
    </center><br><br>
    </body>    

    <script>
        $(document).ready( function () {
            $('#branches').DataTable();
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

            $('.delete').click(function(e){
               e.preventDefault();

               var delete_id = $(this).attr('data-id');
                //alert(delete_id);

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to revert this action.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete"+delete_id+""
                        swal("Successfully deleted", {
                        icon: "success",
                        });
                    }
                    });
            });
        
    </script>
 

@endsection

