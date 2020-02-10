<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Larablog</title>

  <!-- General CSS Files -->
<link rel="icon" href="{{ asset('public/logo/blog.png') }}" type="image/x-icon"/>
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('notif/notiflix-1.9.1.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{asset('assets/modules/chocolat/dist/css/chocolat.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
@yield('css')

  <!-- Template CSS -->
<link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/components.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="{{asset('notif/notiflix-1.9.1.min.js')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>
  <div id="app">
    <div class="main-wrapper main-wrapper-1" style="background-color:#e6e9eb;">
      <div class="navbar-bg"></div>
      @auth
        @include('backend.topbar')
        @include('backend.sidebar')
      @endauth
      <!-- Main Content -->
      <div class="main-content" style="background-color:#e6e9eb;">
        <section class="section">
          @auth
            @yield('sub-title')
          @endauth
            @yield('content')
        </section>
      </div>
    </div>
    @include('backend.footer')
  </div>

  <!-- General JS Scripts -->
<script src="{{asset('assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/tooltip.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/modules/moment.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js') }}"></script>
  <!-- JS Libraies -->
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/features-post-create.js')}}"></script>
<script src="{{asset('assets/js/page/components-user.js')}}"></script>
<script src="{{asset('assets/modules/prism/prism.js')}}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
  <!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>