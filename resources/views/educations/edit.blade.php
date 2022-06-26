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

<div class="vertical-space-60"></div>
<div class="job-post-box">
<form action="{{ route('educations.update',$education->id) }}" method="POST" onsubmit="return submitForm(this);">
        @csrf
        @method('PUT')
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="level">Educational Level</label>
<select class="form-control" id="level" name="level">
            <option value="">Choose Education Level</option>
            <option value="Primary/Secondary School/SPM/'O' Level" {{($education->level === "Primary/Secondary School/SPM/'O' Level") ? 'Selected' : ''}}>Primary/Secondary School/SPM/'O' Level</option>
            <option value="Higher Secondary School/STPM/'A' Level/Pre-U"  {{($education->level === "Higher Secondary School/STPM/'A' Level/Pre-U") ? 'Selected' : ''}} >Higher Secondary School/STPM/'A' Level/Pre-U</option>
            <option value="Professional Certificate"   {{($education->level === "Professional Certificate") ? 'Selected' : ''}} >Professional Certificate</option>
            <option value="Diploma" {{($education->level === "Diploma") ? 'Selected' : ''}} >Diploma</option>
            <option value="Advanced/Higher/Graduate Diploma"   {{($education->level === "Advanced/Higher/Graduate Diploma") ? 'Selected' : ''}} >Advanced/Higher/Graduate Diploma</option>
            <option value="Bachelor's Degree"  {{($education->level === "Bachelor's Degree") ? 'Selected' : ''}} >Bachelor's Degree</option>
            <option value="Master's Degree"   {{($education->level === "Master's Degree") ? 'Selected' : ''}} >Master's Degree</option>
            <option value="Doctorate(PhD)" {{($education->level === "Doctorate(PhD)") ? 'Selected' : ''}} >Doctorate(PhD)</option>
      </select>
</div>
</div>

<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="certificate">Qualification</label>
<input type="text" class="form-control" id="certificate" name="certificate" value="{{  $education->certificate  }}">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="institution">Institution</label>
<input type="text" class="form-control" id="institution" name="institution" value="{{  $education->institution  }}">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="field_study">Field of Study</label>
<select class="form-control" id="field_study" name="field_study">
            <option value="">Choose Field of Study</option>
            <option value="Advertising/Media"  {{($education->field_study === "Advertising/Media") ? 'Selected' : ''}}>Advertising/Media</option>
            <option value="Art/Design/Creative Multimedia" {{($education->field_study === "Advertising/Media") ? 'Selected' : ''}}>Art/Design/Creative Multimedia</option>
            <option value="Business Studies/Administration/Management" {{($education->field_study === "Business Studies/Administration/Management") ? 'Selected' : ''}} >Business Studies/Administration/Management</option>
            <option value="Economics" {{($education->field_study === "Economics") ? 'Selected' : ''}} >Economics</option>
            <option value="Finance/Accountancy/Banking" {{($education->field_study === "Finance/Accountancy/Banking") ? 'Selected' : ''}} >Finance/Accountancy/Banking</option>
            <option value="Marketing" {{($education->field_study === "Marketing") ? 'Selected' : ''}} >Marketing</option>
            <option value="Medicine/Healthcare" {{($education->field_study === "Medicine/Healthcare") ? 'Selected' : ''}}>Medicine/Healthcare</option>
            <option value="Personal Service" {{($education->field_study === "Personal Service") ? 'Selected' : ''}} >Personal Service</option>
            <option value="Sciences" {{($education->field_study === "Sciences") ? 'Selected' : ''}}>Sciences</option>
            <option value="Others" {{($education->field_study === "Others") ? 'Selected' : ''}} >Others</option>
      </select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="grad_date">Graduation Date</label>
<input type="month" class="form-control" id="grad_date" name="grad_date" value="{{  $education->grad_date  }}">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="grade">Grade</label>
<input type="text" class="form-control" id="grade" name="grade" value="{{  $education->grade  }}">
</div>
</div>
</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
                <a><button type="submit" class="btn btn-success">Submit</button></a>
                <a class="btn btn-primary" href="{{ route('educations.index') }}"> Back</a>
      </div>
</form>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

