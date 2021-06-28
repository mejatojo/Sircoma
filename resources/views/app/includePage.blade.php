<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIRCOMA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- Site Icons -->

<link rel="shortcut icon" href="{{asset('images/fevicon.ico.png')}}" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- Site CSS -->
<link rel="stylesheet" href="{{asset('style.css')}}">
<!-- Colors CSS -->
<link rel="stylesheet" href="{{asset('css/colors.css')}}">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="{{asset('css/versions.css')}}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
<!-- building CSS -->
<link rel="stylesheet" href="{{asset('css/building.css')}}">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
  @yield('style')
</head>

<body class="building_version" data-spy="scroll" data-target=".header">
  @include('app.header')
    @yield('content') 
  @include('app.footer')
  
    <!-- Vendor JS Files -->
  <!-- ALL JS FILES -->
  <script src="{{asset('js/all.js')}}"></script>
  <!-- ALL PLUGINS -->
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="{{asset('js/portfolio.js')}}"></script>
  <script src="{{asset('js/hoverdir.js')}}"></script>
  <script src="https://use.fontawesome.com/3e6fb917ce.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  var listener=getEventListeners(window)
console.log(listener)
window.removeEventListener('click', ƒ)

  </script>
  @yield('script')
  <!-- Template Main JS File -->


</body>

</html>