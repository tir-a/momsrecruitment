@include('partial.topbar')

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

<section id="post_job">
<div class="vertical-space-40"></div>
<div class="vertical-space-101"></div>
<div class="container">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3><strong>Application Details</strong></h3>
        </div>
       
    </div>
</div>

<div class="vertical-space-60"></div>
<div class="job-post-box">
<form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
<div class="col-lg-6 col-md-6">
@foreach ($vacancy as $vacancy)
<input hidden value="{{ $vacancy->id }}" name="vacancy_id">
@endforeach
<div class="form-group">
<label>Upload Resume</label>
<input type="file" name="resume" id="resume" class="form-control" required/>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="qualification">Date Apply</label>
<input type="date" class="form-control" id="date_apply" min="<?php echo date("Y-m-d"); ?>" name="date_apply" required />
</div>
</div>
</div>

<button type="submit" class="Save">Submit</button>

</div>


</form>
</div>
</div>
</section>



