@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
        <div class="col-xl-8 text-left" >
          <center><h2>Branch Information</h2></center>
           <div class="card mb-4">
           <div class="card-header">Details</div>
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Location:</strong>
                          <input type="text" name="position" value="{{ $branch->location }}" class="form-control" readonly />
                        </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 d-flex justify-content-center  text-right">
                        <a class="btn btn-primary" href="{{ route('branches.index') }}"> Back</a>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>

           </div>
        </div>
</div>
<br><br><br>  

@endsection