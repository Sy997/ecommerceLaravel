@extends('layout.index')
@section('title','About Us')
@section('content')
<!-- Main Container -->
  
<div class="main container">
 
 <div class="about-page">
    <div class="col-xs-12 col-sm-6"> 
      
      <h1>Welcome to <span class="text_color">MyStore</span></h1>
      <p>Cửa hàng Mystore được thành lập năm 2009 với tư cách một hệ thống uy tín chuyên kinh doanh các mặt hàng công nghệ, nổi bật là điện thoại di động, máy tính bảng, laptop, phụ kiện, linh kiện...<br>
        <br>
        Trong suốt những năm vừa qua, với nỗ lực không mệt mỏi công ty đã trở thành một trong những nhà bán lẻ có vị thế cao trong thị phần công nghệ, phủ sóng từ điện thoại, máy tính bảng, laptop đến phụ kiện.</p>
      <ul>
        <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Suspendisse potenti. Morbi mollis tellus ac sapien.</a></li>
        <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu.</a></li>
        <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Phasellus accumsan cursus velit. Pellentesque egestas.</a></li>
        <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Lorem Ipsum generators on the Internet tend to repeat predefined.</a></li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="single-img-add sidebar-add-slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active"> <img src="main/images/about_us_slide1.jpg" alt="slide1"> </div>
            <div class="item"> <img src="main/images/about_us_slide2.jpg" alt="slide2"> </div>
            <div class="item"> <img src="main/images/about_us_slide3.jpg" alt="slide3"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="our-team"> 

<div class="container"> <div class="page-header">
    <h2>Our Team</h2>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow bounceInUp" data-wow-delay="0.2s">
        <div class="team">
          <div class="inner">
            <div class="avatar"><img src="main/images/team-img01.jpg" alt="" class="img-responsive img-circle" /></div>
            <h5>Joana Doe</h5>
            <p class="subtitle">Art-director</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow bounceInUp" data-wow-delay="0.5s">
        <div class="team">
          <div class="inner">
            <div class="avatar"><img src="main/images/team-img02.jpg" alt="" class="img-responsive img-circle" /></div>
            <h5>Josefine</h5>
            <p class="subtitle">Team Leader</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow bounceInUp" data-wow-delay="0.8s">
        <div class="team">
          <div class="inner">
            <div class="avatar"><img src="main/images/team-img03.jpg" alt="" class="img-responsive img-circle" /></div>
            <h5>Paulo Moreira</h5>
            <p class="subtitle">Senior Web Developer</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow bounceInUp" data-wow-delay="1s">
        <div class="team">
          <div class="inner">
            <div class="avatar"><img src="main/images/team-img04.jpg" alt="" class="img-responsive img-circle" /></div>
            <h5>Tom Joana</h5>
            <p class="subtitle">Digital Creative Director</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-6"> 
    <!-- Testimonials Box -->
    <div class="testimonials">
      <div class="slider-items-products">
        <div id="testimonials-slider" class="product-flexslider hidden-buttons home-testimonials">
          <div class="slider-items slider-width-col4 ">
            <div class="holder">
              <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. </p>
              <div class="thumb"> <img src="main/images/testimonials-img3.jpg" alt="testimonials img"> </div>
              <strong class="name">John Doe</strong> <strong class="designation">CEO, Company</strong> </div>
            <div class="holder">
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
              <div class="thumb"> <img src="main/images/testimonials-img1.jpg" alt="testimonials img"> </div>
              <strong class="name">Vince Roy</strong> <strong class="designation">CEO, Newspaper</strong> </div>
            <div class="holder">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
                minim veniam, quis nostrud. </p>
              <div class="thumb"> <img src="main/images/testimonials-img2.jpg" alt="testimonials img"> </div>
              <strong class="name">John Doe</strong> <strong class="designation">CEO, ABC Softwear</strong> </div>
            <div class="holder">
              <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat.</p>
              <div class="thumb"> <img src="main/images/testimonials-img4.jpg" alt="testimonials img"> </div>
              <strong class="name">Vince Roy</strong> <strong class="designation">CEO, XYZ Softwear</strong> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials Box --> 
  <!-- our clients Slider -->
  <div class="col-md-6">
    <div class="our-clients">
      <div class="slider-items-products">
        <div id="our-clients-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6"> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="main/images/brand1.html" alt="Image"></a> <a href="#"><img src="main/images/brand2.png" alt="Image"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="main/images/brand3.png" alt="Image"></a> <a href="#"><img src="main/images/brand4.png" alt="Image"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="main/images/brand5.png" alt="Image"></a> <a href="#"><img src="main/images/brand6.png" alt="Image"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="main/images/brand7.png" alt="Image"></a> <a href="#"><img src="main/images/brand3.png" alt="Image"></a> </div>
            <!-- End Item --> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 

@endsection