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

<header class="header">

</header>

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
<form action="{{ route('experiences.store') }}" method="POST" onsubmit="return submitForm(this);">
    @csrf
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="job">Position</label>
<input type="text" class="form-control" id="job" name="job" placeholder="Position">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="job_level">Position Level</label>
      <select class="form-control" id="job_level" name="job_level">
            <option value="">Choose Position Level</option>
            <option value="Senior Manager">Senior Manager</option>
            <option value="Manager">Manager</option>
            <option value="Senior Executive">Senior Executive</option>
            <option value="Junior Executive">Junior Executive</option>
            <option value="Fresh/Entry level">Fresh/Entry level</option>
            <option value="Non-Executive">Non-Executive</option>
      </select></div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="specialization">Specialization</label>
      <select class="form-control" id="specialization" name="specialization">
            <option value="">Choose Specialization Group</option>
            <option value="Admin/Human Resources">Admin/Human Resources</option>
            <option value="Advertising/Media Planning">Advertising/Media Planning</option>
            <option value="Arts/Creative/Graphics Design">Arts/Creative/Graphics Design</option>
            <option value="Accounting/Finance">Accounting/Finance</option>
            <option value="General Work(Driver, etc)">General Work (Driver, etc)</option>
            <option value="Personal Care/Beauty/Fitness Service">Sales/Marketing</option>
            <option value="Sales/Marketing">Sales/Marketing</option>
            <option value="Services">Services</option>
            <option value="Others">Others</option>
      </select>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="company">Company</label>
<input type="text" class="form-control" id="company" name="company" placeholder="Company">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="date_joined">Date Joined</label>
<input type="date" class="form-control" id="date_joined" name="date_joined" placeholder="Date Joined">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label for="working_year">Years in Position</label>
<input type="number" min="0" onkeypress="return isNumberKey(event)" name="working_year" class="form-control" placeholder="Years in Position">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-6">
<div class="form-group">
<label for="detail">Detail</label>
<textarea rows="20" cols="50" class="form-control" id="detail" name="detail" placeholder="Detail"></textarea>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
                <a><button type="submit" class="btn btn-success">Submit</button></a>
                <a class="btn btn-primary" href="{{ route('experiences.index') }}"> Back</a>
        </div>

</form>
</div>
</div>
</section>

@include('partial.footer')


</body>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
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
