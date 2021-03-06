@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-8 text-left" >
          <center><h2>Update Branch</h2></center>

            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Details</div>
                <div class="card-body">
               
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('branches.update',$branch->id) }}" method="POST"  onsubmit="return submitForm(this);">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" value="{{ $branch->location }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea rows="5" cols="50" name="b_address" class="form-control">{{ old('b_address', $branch->b_address) }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Contact No:</strong>
                    <input type="text" name="contact" value="{{ $branch->contact }}" class="form-control">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('branches.index') }}"> Back</a>
                </div>
    </div>
</form>

</div></div>
</div>
</div>
</div>

@include('sweetalert::alert')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function submitForm(form) {
        swal({
            title: "Are you sure?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                form.submit();
            }
        });
        return false;
    }
    </script>
    
@endsection