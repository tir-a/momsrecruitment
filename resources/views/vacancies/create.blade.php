@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-8 text-left" >
          <center><h2>New Job Vacancy</h2></center>

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
   
<form action="{{ route('vacancies.store') }}" method="POST" onsubmit="return submitForm(this);">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                <input type="text" name="position" class="form-control" placeholder="Position">
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <textarea rows="6" cols="50"  class="form-control" id="mySummernote1" name="description"  style="white-space: pre-wrap;" placeholder="Description" ></textarea>
            </div>
            <div class="form-group">
                <strong>Requirement:</strong>
                <textarea rows="4" cols="50"  class="form-control" id="mySummernote2" name="requirement"  placeholder="Requirement" ></textarea>
            </div>
            <div class="form-group">
                <strong>Qualification:</strong>
                <textarea rows="4" cols="50"  class="form-control" id="mySummernote3" name="qualification"  placeholder="Qualification" ></textarea>
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Choose Status --</option>
                    <option value="Available">Available</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="number" min="0" onkeypress="return isNumberKey(event)" name="quantity" class="form-control" placeholder="Quantity">
            </div>
            <div class="form-group">
                <strong>Closing date:</strong>
                <input type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" name="date_close"  placeholder="Closing date" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('vacancies.index') }}"> Back</a>
        </div>
    </div>
</form>

</div></div>
</div>
</div>
</div>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}</script>

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

<br><br>

@endsection