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
<input type="text" class="form-control" placeholder="Educational Level" style="border:none" readonly />
<input type="text" class="form-control" id="level" name="level" value="{{  $education->level  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Qualification" style="border:none" readonly />
<input type="text" class="form-control" id="certificate" name="certificate" value="{{  $education->certificate  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Institution" style="border:none" readonly />
<input type="text" class="form-control" id="institution" name="institution" value="{{  $education->institution  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Area of Study" style="border:none" readonly />
<input type="text" class="form-control" id="field_study" name="field_study" value="{{  $education->field_study  }}" readonly />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Graduation Date" style="border:none" readonly />
<input type="text" class="form-control" id="" name="grad_date" value="{{  $education->grad_date  }}" readonly />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Grade" style="border:none" readonly />
<input type="text" class="form-control" id="grade" name="grade" value="{{  $education->grade  }}" readonly />
</div>
</div>
</div><br>
<div class="row">    
  <div class="col-6 d-flex text-center">
     <a class="btn btn-info" href="javascript:history.back()"> Back</a>&nbsp;
     <a class="btn btn-primary" href="{{ route('educations.edit',$education->id) }}">Edit</a>&nbsp;
     @if ($applications->isNotEmpty())
      <form action="{{ route('educations.destroy',$education->id) }}" method="POST">
           @csrf
           @method ('DELETE')
       <a> <button type="submit" class="btn btn-danger" >Delete</button></a>
     @endif
     </form>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')



