@extends('layouts.template')
@section('content')

<div class="container-xl px-4 mt-4" align="center">
        <div class="col-xl-8 text-left" >
          <center><h2>Branch Details</h2></center>
          <div class="card mb-4">
                <div class="card-body">
                  <div class="card mb-3">
                   <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                          {{ $branch->location }}
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                       <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         {{ $branch->b_address  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact No</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                                {{ $branch->contact  }}
                    </div>
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