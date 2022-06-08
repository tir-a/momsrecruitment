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

<br>
@if ($education->isEmpty())
<section id="Blog">
<div class="row">
    <div class="col-lg-8 col-md-6">
     <div class="blog-box">
        <div class="text-left">
            <p>Profile Status: <span style="color: #ff0000; font-weight:bold;">Incomplete</span></p>
            <p>Please complete your <span style="font-weight:bold;">education details</span></p>
        </div>
        </div>
    </div>
</section>
@endif

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

<div class="vertical-space-10"></div>
<div class="job-post-box">
    
<form action="{{ route('educations.store') }}" method="POST">
    @csrf
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="level">Educational Level</label><br>
      <select class="form-control" id="level" name="level" required>
            <option value="">Choose Education Level</option>
            <option value="Primary/Secondary School/SPM/'O' Level">Primary/Secondary School/SPM/'O' Level</option>
            <option value="Higher Secondary School/STPM/'A' Level/Pre-U">Higher Secondary School/STPM/'A' Level/Pre-U</option>
            <option value="Professional Certificate">Professional Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Advanced/Higher/Graduate Diploma">Advanced/Higher/Graduate Diploma</option>
            <option value="Bachelor's Degree">Bachelor's Degree</option>
            <option value="Master's Degree">Master's Degree</option>
            <option value="Doctorate(PhD)">Doctorate(PhD)</option>
      </select>
</div>
</div>

<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="certificate">Qualification</label>
<input type="text" class="form-control" id="certificate" name="certificate" placeholder="Ex: Bachelor of Business Administration" required />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="institution">Institution</label>
<input type="text" class="form-control" id="institution" name="institution" placeholder="Ex: Universiti Malaya" required />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="field_study">Field of Study</label>
<select class="form-control" id="field_study" name="field_study" required>
            <option value="">Choose Field of Study</option>
            <option value="Advertising/Media">Advertising/Media</option>
            <option value="Art/Design/Creative Multimedia">Art/Design/Creative Multimedia</option>
            <option value="Business Studies/Administration/Management">Business Studies/Administration/Management</option>
            <option value="Economics">Economics</option>
            <option value="Finance/Accountancy/Banking">Finance/Accountancy/Banking</option>
            <option value="Marketing">Marketing</option>
            <option value="Medicine/Healthcare">Medicine/Healthcare</option>
            <option value="Personal Service">Personal Service</option>
            <option value="Sciences">Sciences</option>
            <option value="Others">Others</option>
      </select></div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="grad_date">Graduation Date</label>
<input type="month" class="form-control" id="" name="grad_date" placeholder="Graduation Date" required />
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="grade">CGPA</label>
<input type="number" min="0.00" max="4.00" step="0.01" class="form-control" id="grade" name="grade" placeholder="Ex: 3.90" required />
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
</section>

@include('partial.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function() {
  $('#datepicker').datepicker({
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).datepicker('setDate', new Date(year, 1));
    }
  });

  $("#datepicker").focus(function() {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
  });

});
</script>

