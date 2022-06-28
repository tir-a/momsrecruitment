{{-- Using email layout from mail vendor --}}
@component('mail::message') 
<h1>{{ __("Greetings, Sir/Madam,") }}</h1>
<p>{{  __("Your job application status has been updated.") }}</p>
<p>{{  __(" Login to Moms Recruitment to view.") }}</p>
<center><button class="btn btn-danger" style="width: 80px; height: 40px;" url="http://localhost/momsrecruitment/public/">Login</button></center><br>
{{ __('Regards,') }}<br>
Moms Postnatal Care
@endcomponent