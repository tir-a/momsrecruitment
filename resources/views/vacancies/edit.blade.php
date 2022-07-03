@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
          <div class="col-xl-10 text-left" >
          <center><h2>Update Job Vacancy</h2></center>

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
  
    <form action="{{ route('vacancies.update',$vacancy->id) }}" method="POST" onsubmit="return submitForm(this);">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Position:</strong>
                <input type="text" name="position" value="{{ $vacancy->position }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea rows="6" cols="50" name="description" id="mySummernote1" class="form-control" required>{{ old('description', $vacancy->description) }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Requirement:</strong>
                    <textarea rows="4" cols="50" name="requirement" id="mySummernote2" class="form-control" required>{{ old('requirement', $vacancy->requirement) }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Qualification:</strong>
                    <textarea rows="4" cols="50" name="qualification" id="mySummernote3" class="form-control" required>{{ old('qualification', $vacancy->qualification) }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Additional Detail:</strong>
                    <textarea rows="4" cols="50" name="add_detail" id="mySummernote4" class="form-control" required>{{ old('add_detail', $vacancy->add_detail) }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">-- Choose Status --</option>
                        <option value="Available"  {{($vacancy->status === "Available") ? 'Selected' : ''}}>Available</option>
                        <option value="Closed"  {{($vacancy->status === "Closed") ? 'Selected' : ''}}>Closed</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong>No of Availability:</strong>
                    <input type="number" min="0" onkeypress="return isNumberKey(event)" name="quantity" value="{{ $vacancy->quantity }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <strong>Closing date:</strong>
                    <input type="date" name="date_close"  value="{{ $vacancy->date_close }}" class="form-control" required>
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