@include('partial.topbar')

<section id="post_job">
<div class="vertical-space-40"></div>
<div class="vertical-space-101"></div>
<div class="container">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3><strong>Education Details</strong></h3>
        </div>
    </div>
</div>

<div class="vertical-space-60"></div>
<div class="job-post-box">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="level">Educational Level</label><br><br>
<input type="text" class="form-control" id="level" name="level" value="{{  $education->level  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="level">Qualification</label><br><br>
<input type="text" class="form-control" id="certificate" name="certificate" value="{{  $education->certificate  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group"><br>
<label for="level">Institution</label><br><br>
<input type="text" class="form-control" id="institution" name="institution" value="{{  $education->institution  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group"><br>
<label for="level">Area of Study</label><br><br>
<input type="text" class="form-control" id="field_study" name="field_study" value="{{  $education->field_study  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group"><br>
<label for="level">Graduation Date</label><br><br>
<input type="text" class="form-control" id="" name="grad_date" value="{{  $education->grad_date  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group"><br>
<label for="level">Grade</label><br><br>
<input type="text" class="form-control" id="grade" name="grade" value="{{  $education->grade  }}" readonly />
</div>
</div>
</div><br>
<div class="row">    
  <div class="col-6 d-flex text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     <a class="btn btn-warning" href="{{ route('educations.edit',$education->id) }}">Edit</a>&nbsp;
     @if ($applications->isEmpty())
      <form action="{{ route('educations.destroy',$education->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete? This action cannot be revert.')">
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



