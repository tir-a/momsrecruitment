@section('content')

<style>
#recruiters {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#recruiters td, #recruiters th {
  border: 1px solid #ddd;
  padding: 8px;
}

#recruiters tr:nth-child(even){background-color: #f2f2f2;}

#recruiters tr:hover {background-color: #ddd;}

#recruiters th {
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
                <h2>List of Recruiters</h2>
            </div>
            <div class="pull-right" align="right">

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
    <table class="table table-bordered"  id="recruiters" style="width: 84%;">
        <tr>
            <th class="text-center">Recruiter ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Branch</th>
            <th class="text-center" width="280px">Action</th>
        </tr>
        @foreach ($users as $index=> $r)
        <tr>
            <td>{{ $index +1}}</td>
            <td>{{ $r->name }}</td>
            <td>{{ $r->location }}</td>
            <td>
                <form action="{{ route('recruiters.destroy',$r->id) }}" method="POST">
       
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> </center>
</body>

@endsection

