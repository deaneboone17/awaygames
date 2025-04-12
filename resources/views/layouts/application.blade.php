<!DOCTYPE html>
<!--[if lt IE 7 ]><html itemscope itemtype="https://schema.org/" id="ie6" class="ie" lang="en-US"><![endif]-->
<!--[if IE 7 ]>   <html itemscope itemtype="https://schema.org/" id="ie7" class="ie" lang="en-US"><![endif]-->
<!--[if IE 8 ]>   <html itemscope itemtype="https://schema.org/" id="ie8" class="ie" lang="en-US"><![endif]-->
<!--[if IE 9 ]>   <html itemscope itemtype="https://schema.org/" id="ie9" class="ie" lang="en-US"><![endif]-->
<!--[if gt IE 9]><!-->
<html itemscope itemtype="https://schema.org/" lang="en-US">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('partials.meta')

  <title>AwayGames</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/plugins/aos/aos.css">
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  
  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  
  @yield('customStyles')
  

</head>
<body>
  @include('partials.header')

  <div id="barba-wrapper">
    <div class="barba-container">

    @if(Session::has('warning'))
    <div class="container">
      
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('warning') }}</div>

        </div>
      @endif

      @if(Session::has('alert-success'))
    <div class="container">
      
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('alert-success') }}</div>

        </div>
      @endif

      @yield('content')
    
  </div>

  @include('partials.footer')

  @yield('beforeScript')

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <!-- build:js scripts/vendor.js -->
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/plugins/slick/slick.min.js"></script>
    <script src="/plugins/countUp/dist/countUp.js"></script>
    <script src="/plugins/lightbox/dist/ekko-lightbox.min.js"></script>
    <script src="/plugins/isotope/isotope.pkgd.js"></script>
    <script src="/plugins/barba/dist/barba.min.js"></script>
    <script src="/plugins/aos/aos.js"></script>
  <!-- endbuild -->

  <script type="text/javascript" src="/js/main.js"></script>



  
</body>
</html>
