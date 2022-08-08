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
<form action="{{ route('experiences.update',$experience->id) }}" method="POST" onsubmit="return confirm('Are you sure want to submit?')">
        @csrf
        @method('PUT')
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="certificate">Position</label>
<input type="text" class="form-control" id="job" name="job" value="{{  $experience->job }}" required>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="job_level">Position Level</label>
      <select class="form-control" id="job_level" name="job_level" required>
            <option value="">Choose Position Level</option>
            <option value="Senior Manager" {{($experience->job_level === "Senior Manager") ? 'Selected' : ''}}>Senior Manager</option>
            <option value="Manager" {{($experience->job_level === "Manager") ? 'Selected' : ''}}>Manager</option>
            <option value="Senior Executive" {{($experience->job_level === "Senior Executive") ? 'Selected' : ''}}>Senior Executive</option>
            <option value="Junior Executive" {{($experience->job_level === "Junior Executive") ? 'Selected' : ''}}>Junior Executive</option>
            <option value="Fresh/Entry level" {{($experience->job_level === "Fresh/Entry level") ? 'Selected' : ''}}>Fresh/Entry level</option>
            <option value="Non-Executive" {{($experience->job_level === "Non-Executive") ? 'Selected' : ''}}>Non-Executive</option>
      </select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="institution">Specialization</label>
<select class="form-control" id="specialization" name="specialization" required>
            <option value="">Choose Specialization Group</option>
            <option value="Admin/Human Resources" {{($experience->specialization === "Admin/Human Resources") ? 'Selected' : ''}}>Admin/Human Resources</option>
            <option value="Advertising/Media Planning" {{($experience->specialization === "Advertising/Media Planning") ? 'Selected' : ''}}>Advertising/Media Planning</option>
            <option value="Arts/Creative/Graphics Design" {{($experience->specialization === "Arts/Creative/Graphics Design") ? 'Selected' : ''}}>Arts/Creative/Graphics Design</option>
            <option value="Accounting/Finance" {{($experience->specialization === "Accounting/Finance") ? 'Selected' : ''}}>Accounting/Finance</option>
            <option value="General Work(Driver, etc)" {{($experience->specialization === "General Work(Driver, etc)") ? 'Selected' : ''}}>General Work (Driver, etc)</option>
            <option value="Personal Care/Beauty/Fitness Service" {{($experience->specialization === "Personal Care/Beauty/Fitness Service") ? 'Selected' : ''}}>Personal Care/Beauty/Fitness Service</option>
            <option value="Sales/Marketing" {{($experience->specialization === "Sales/Marketing") ? 'Selected' : ''}}>Sales/Marketing</option>
            <option value="Services" {{($experience->specialization === "Services") ? 'Selected' : ''}}>Services</option>
            <option value="Others" {{($experience->specialization === "Others") ? 'Selected' : ''}}>Others</option>
      </select>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="company">Company</label>
<input type="text" class="form-control" id="company" name="company" value="{{  $experience->company }}" required>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="date_joined">Date Joined</label>
<input type="date" class="form-control" id="date_joined" name="date_joined" value="{{  $experience->date_joined  }}" required>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="working_year">Years in Position</label>
<input type="number" min="0" onkeypress="return isNumberKey(event)" name="working_year" class="form-control" name="working_year" value="{{  $experience->working_year  }}" required>
</div>
</div>
</div>
<div class="form-group">
<label for="detail">Detail</label>
<textarea rows="10" cols="50"  class="form-control" name="detail" required>{{ old('detail', $experience->detail) }}</textarea>
</div>
      <div class="col-xs-12 col-sm-12 col-md-12">
                <a><button type="submit" class="btn btn-success">Submit</button></a>
                <a class="btn btn-primary" href="{{ route('experiences.index') }}"> Back</a>
      </div>
</form>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
</script>

