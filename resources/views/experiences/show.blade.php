@include('partial.topbar')

<section id="post_job">
<div class="vertical-space-40"></div>
<div class="vertical-space-101"></div>
<div class="container">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3><strong>Experience Details</strong></h3>
        </div>
    </div>
</div>

<div class="vertical-space-60"></div>
<div class="job-post-box">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Position" style="border:none" readonly />
<input type="text" class="form-control" id="level" name="level" value="{{  $experience->job  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Position Level" style="border:none" readonly />
<input type="text" class="form-control" id="job_level" name="job_level" value="{{  $experience->job_level  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Specialization" style="border:none" readonly />
<input type="text" class="form-control" id="specialization" name="specialization" value="{{  $experience->specialization  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Company" style="border:none" readonly />
<input type="text" class="form-control" id="company" name="company" value="{{  $experience->company  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Date Joined" style="border:none" readonly />
<input type="text" class="form-control" id="date_joined" name="date_joined" value="{{ $experience->date_joined  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Years in Position" style="border:none" readonly />
<input type="text" class="form-control" id="working_year" name="working_year" value="{{  $experience->working_year  }}" readonly />
</div>
</div>
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Detail" style="border:none" readonly />
<textarea rows="4" cols="50"  class="form-control" placeholder="{{ $experience->detail }}" readonly /></textarea>
</div>
<br>
<div class="row">    
<div class="col-6 d-flex text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     <a class="btn btn-warning" href="{{ route('experiences.edit',$experience->id) }}">Edit</a>&nbsp;
     @if ($applications->isEmpty())
      <form action="{{ route('experiences.destroy',$experience->id) }}" method="POST">
           @csrf
           @method ('DELETE')
     <a> <button type="submit" class="btn btn-danger" >Delete</button></a>
     </form>
     @endif
</div>

</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')
