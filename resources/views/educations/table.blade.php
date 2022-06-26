@if(Auth::User()->role == 'applicant')

@include('partial.topbar')


<style>.element::-webkit-input-placeholder {
    color: black;
    font-weight: 800;
}</style>

<br><br><br><br><br><br><br>

<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-85"></div>
<div class="container text-center" style="width:800px; margin:0 auto;">
<section id="resent-job-post" class="background-color-white-drak">
<div class="vertical-space-55"></div>

<div class="col-lg-12 col-md-12">
<h3 class="text-left">List of Educations</h3>
<div class="vertical-space-5"></div>
<br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" align="right">
                <a class="btn btn-success" href="{{ route('educations.create') }}" > Add New Education</a><br/>
            </div>
        </div>
    </div>
   <br>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@foreach ($educations as $ed)

<div class="detail width-100">
<div class="media display-inline text-align-center">
<div class="media-body text-left text-align-center">
<h6><a href="#" class="font-color-black"> </a></h6>
<i class="large material-icons">account_balance</i>
<span class="text">  Institute: {{ $ed -> institution }} </span>
<br /><br>
<i class="large material-icons">assignment</i>
<span class="text font-size"> Qualification: {{ $ed -> certificate }}  </span>
<div class="float-right margin-top text-align-center">
<a href="{{ route('educations.show' , $ed->id)  }}" class="btn btn-info">View</a><br><br>
</div>
</div>
</div>
</div>
@endforeach 


<div class="vertical-space-20"></div>
<div class="vertical-space-25"></div>
<div class="job-list width-100">
<ul class="pagination justify-content-end margin-auto">
<li class="page-item"><a class="page-link pdding-none" href="javascript:void(0);"><i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_left</i></a></li>
<li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
<li class="page-item">
<a class="page-link pdding-none" href="javascript:void(0);"> <i class=" material-icons keyboard_arrow_left_right">keyboard_arrow_right</i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="vertical-space-60"></div>
</section>

@include('partial.footer')


@elseif(Auth::User()->role == 'recruiter')
@extends('layouts.template')
@section('content')

@endsection

@endif
