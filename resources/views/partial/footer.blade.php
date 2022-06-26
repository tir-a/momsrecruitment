@if (Route::has('login'))
@auth
@if(Auth::User()->role == 'applicant')

<footer id="footer" class="background-color-white">
<div class="container">
<div class="vertical-space-100"></div>
<div class="row">
<div class="col-lg-5 col-md-6 vertical-space-2">
<h5>Join Us</h5>
<p class="paregraf">LETS BE OUR HEALTH & WELLNESS PARTNER</p>
</div>
<div class="col-lg-2 col-md-4 vertical-space-2">
<h5>Company</h5>
<div class="text">
<a href="{{ route('about') }}">About</a>
<a href="{{ route('contact') }}">Contact Us</a>
</div>
</div>

<div class="col-lg-5 col-md-6 vertical-space-2">
<a href="https://web.facebook.com/momspostnatalcareconsultantservices"  target="_blank">
<i class="fa fa-facebook social-icon"></i></a>
<a href="https://www.instagram.com/moms_postnatal_care/"  target="_blank">
<i class="fa fa-instagram social-icon"></i></a>
<a href="https://www.youtube.com/channel/UC5Cl3N6nOESsFvwOhNJcG6w?view_as=subscriber"  target="_blank">
<i class="fa fa-youtube social-icon"></i></a>
<a href="https://api.whatsapp.com/send?phone=60136728595&text=MomsPostnatalcareBolehBantuSaya"  target="_blank">
<i class="fa fa-whatsapp social-icon"></i></a>
<div class="vertical-space-30"></div>
</div>
</div>
<div class="vertical-space-0"></div>
</div>
<div class="container-fluid background-color-orange main-footer">
<div class="container text-center">
<div class="vertical-space-30"></div>
</div>
</div>
</footer>


<script data-cfasync="false" src="{{ asset('applicant/js/email-decode.min.js') }}"></script><script src="{{ asset('applicant/js/jquery.min.js') }}"></script>
<script src="{{ asset('applicant/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('applicant/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('applicant/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('applicant/js/custom.js') }}"></script>
<script async defer src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fcoolbackgrounds.io%2Fimages%2Fbackgrounds%2Fwhite%2Fpure-white-background-85a2a7fd.jpg&imgrefurl=https%3A%2F%2Fcoolbackgrounds.io%2Fwhite-background%2F&tbnid=7K6HWuuNIEehPM&vet=12ahUKEwjJprbF3r33AhXFFLcAHb_XAc4QMygCegUIARDjAQ..i&docid=ZQONKhDBgUt4oM&w=1200&h=600&q=white%20background&ved=2ahUKEwjJprbF3r33AhXFFLcAHb_XAc4QMygCegUIARDjAQ">
    </script>
<script>
        $(".search-icone").click(function(){
     // $(".menu").animate({height: "100vh"});
});

    </script>
</body>

</html>
@endif

@else
<footer id="footer" class="background-color-white">
<div class="container">
<div class="vertical-space-100"></div>
<div class="row">
<div class="col-lg-5 col-md-6 vertical-space-2">
<h5>Join Us</h5>
<p class="paregraf">LETS BE OUR HEALTH & WELLNESS PARTNER</p>
</div>
<div class="col-lg-2 col-md-4 vertical-space-2">
<h5>Company</h5>
<div class="text">
<a href="{{ route('gabout') }}">About</a>
<a href="{{ route('gcontact') }}">Contact Us</a>
</div>
</div>

<div class="col-lg-5 col-md-6 vertical-space-2">
<a href="https://web.facebook.com/momspostnatalcareconsultantservices"  target="_blank">
<i class="fa fa-facebook social-icon"></i></a>
<a href="https://www.instagram.com/moms_postnatal_care/"  target="_blank">
<i class="fa fa-instagram social-icon"></i></a>
<a href="https://www.youtube.com/channel/UC5Cl3N6nOESsFvwOhNJcG6w?view_as=subscriber"  target="_blank">
<i class="fa fa-youtube social-icon"></i></a>
<a href="https://api.whatsapp.com/send?phone=60136728595&text=MomsPostnatalcareBolehBantuSaya"  target="_blank">
<i class="fa fa-whatsapp social-icon"></i></a>
<div class="vertical-space-30"></div>
</div>
</div>
<div class="vertical-space-0"></div>
</div>
<div class="container-fluid background-color-orange main-footer">
<div class="container text-center">
<div class="vertical-space-30"></div>
</div>
</div>
</footer>


<script data-cfasync="false" src="{{ asset('applicant/js/email-decode.min.js') }}"></script><script src="{{ asset('applicant/js/jquery.min.js') }}"></script>
<script src="{{ asset('applicant/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('applicant/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('applicant/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('applicant/js/custom.js') }}"></script>
<script async defer src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fcoolbackgrounds.io%2Fimages%2Fbackgrounds%2Fwhite%2Fpure-white-background-85a2a7fd.jpg&imgrefurl=https%3A%2F%2Fcoolbackgrounds.io%2Fwhite-background%2F&tbnid=7K6HWuuNIEehPM&vet=12ahUKEwjJprbF3r33AhXFFLcAHb_XAc4QMygCegUIARDjAQ..i&docid=ZQONKhDBgUt4oM&w=1200&h=600&q=white%20background&ved=2ahUKEwjJprbF3r33AhXFFLcAHb_XAc4QMygCegUIARDjAQ">
    </script>
<script>
        $(".search-icone").click(function(){
     // $(".menu").animate({height: "100vh"});
});

    </script>
</body>

</html>
@endauth
@endif
