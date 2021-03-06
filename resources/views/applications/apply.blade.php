@include('partial.topbar')

<section id="post_job">
<div class="vertical-space-40"></div>
<div class="vertical-space-101"></div>
<div class="container">

<div class="vertical-space-60"></div>
<div class="job-post-box">

<div class="row">
<div class="col-lg-12 col-md-6">
<div class="form-group">
<p>Sorry, your application cannot be processed.</p><br>
<p>Please make sure<span style="font-weight:bold;"> your profile and education details are complete</span> and apply again.</p>
</div>
</div>
</div>
<br>
<a class="btn btn-primary" href="{{ route('educations.create') }}"> Complete education</a>
<a class="btn btn-info" href="{{ route('users.edit', Auth::User()->id) }}"> Complete profile</a>
<a class="btn btn-danger" href="javascript:history.back()"> Close</a>

</div>


</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')