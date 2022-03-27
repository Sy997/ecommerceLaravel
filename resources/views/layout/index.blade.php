<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MyStore | @yield('title')</title>
  <base href="{{asset('')}}">
  <meta name="description" content="best template, template free, responsive theme, fashion store, responsive theme, responsive html theme, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
  <meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"
  />
  <!-- Mobile specific metas  , -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>

  <!-- CSS Style -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="main/css/bootstrap.min.css">

  <!-- font-awesome & simple line icons CSS -->
  <link rel="stylesheet" type="text/css" href="main/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="main/css/simple-line-icons.css" media="all">

  <!-- owl.carousel CSS -->
  <link rel="stylesheet" type="text/css" href="main/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="main/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="main/css/owl.transitions.css">

  <!-- animate CSS  -->
  <link rel="stylesheet" type="text/css" href="main/css/animate.css" media="all">

  <!-- flexslider CSS -->
  <link rel="stylesheet" type="text/css" href="main/css/flexslider.css">

  <!-- jquery-ui.min CSS  -->
  <link rel="stylesheet" type="text/css" href="main/css/jquery-ui.css">

  <!-- Revolution Slider CSS -->
  <link href="main/css/revolution-slider.css" rel="stylesheet">

  <!-- style CSS -->
  <link rel="stylesheet" type="text/css" href="main/css/style.css" media="all">
  @yield('css')
</head>

<body class="cms-index-index cms-home-page">

  <!-- mobile menu -->
  <div id="mobile-menu">
    <ul>
      <li>
        <a href="{{route('trang-chu')}}" class="home1">Trang chủ</a>
      </li>
      <li>
        <a href="{{route('lien-he')}}">LIên hệ</a>
      </li>
      <li>
        <a href="{{route('about-us')}}">Về chúng tôi</a>
      </li>
    </ul>
  </div>
  <!-- end mobile menu -->
  <div id="page">

    <!-- Header -->
    <!-- end header-->
    @include('layout.header')
    <!-- Home Slider Start -->
    <!--main content-->
    @yield('content')
    <!-- Footer -->
    @include('layout.footer')
    <!-- End Footer -->

  </div>


  <!-- JS -->

  <!-- jquery js -->
  <script type="text/javascript" src="main/js/jquery.min.js"></script>

  <!-- bootstrap js -->
  <script type="text/javascript" src="main/js/bootstrap.min.js"></script>


  <!-- owl.carousel.min js -->
  <script type="text/javascript" src="main/js/owl.carousel.min.js"></script>

  <!-- bxslider js -->
  <script type="text/javascript" src="main/js/jquery.bxslider.js"></script>

  <!-- Slider Js -->
  <script type="text/javascript" src="main/js/revolution-slider.js"></script>

  <!-- megamenu js -->
  <script type="text/javascript" src="main/js/megamenu.js"></script>
  <script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

  /* ]]> */
  </script>

  <!-- jquery.mobile-menu js -->
  <script type="text/javascript" src="main/js/mobile-menu.js"></script>

  <!--jquery-ui.min js -->
  <script type="text/javascript" src="main/js/jquery-ui.js"></script>

  <!-- main js -->
  <script type="text/javascript" src="main/js/main.js"></script>

  <!-- countdown js -->
  <script type="text/javascript" src="main/js/countdown.js"></script>

  <!-- Revolution Slider -->
  <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('.tp-banner').revolution(
        {
          delay: 9000,
          startwidth: 1170,
          startheight: 530,
          hideThumbs: 10,

          navigationType: "bullet",
          navigationStyle: "preview1",

          hideArrowsOnMobile: "on",

          touchenabled: "on",
          onHoverStop: "on",
          spinner: "spinner4"
        });
    });
  </script>

  @yield('script')



</body>

</html>