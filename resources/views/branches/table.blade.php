@section('content')

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
    <table class="table table-bordered"  id="branches" style="width: 54%;">
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
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table></center><br><br>
</body>
@endsection
