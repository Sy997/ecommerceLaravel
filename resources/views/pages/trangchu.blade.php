@extends('layout.index')
@section('title',' Trang Chu')
@section('content')
<div class="slider">
      <div class="tp-banner-container clearfix">
        <div class="tp-banner">
          <ul>
          @foreach ($slide as $sl)
            <!-- SLIDE 1 -->
            <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
              <!-- MAIN IMAGE -->
              <img src="main/images/slider/{{$sl->image}}" alt="{{$sl->titles}}" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
              <div class="tp-caption very_big_white skewfromrightshort fadeout" data-x="center" data-y="100" data-speed="500" data-start="1200"
                data-easing="Circ.easeInOut" style=" font-size:70px; font-weight:800; color:#fe0100;">Huge
                <span style=" color:#000;">sale</span>
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-caption medium_text skewfromrightshort fadeout" data-x="center" data-y="165" data-hoffset="0" data-voffset="-73"
                data-speed="500" data-start="1200" data-easing="Power4.easeOut" style=" font-size:20px; font-weight:500; color:#337ab7;">
              Sale off 75% all products </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="210" data-hoffset="0" data-voffset="98"
                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                data-speed="500" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="border: 2px solid #fed700;border-radius: 50px; font-size:14px; background-color:#fed700; color:#333; z-index: 12; max-width: auto; max-height: auto; white-space: nowrap; letter-spacing:1px;">
                <a href='#' class='largebtn slide1'>Learn More</a>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
</div>

    <!-- main container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">

          <!-- Home Tabs  -->
          <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="home-tab">
              <ul class="nav home-nav-tabs home-product-tabs">
                <li class="active">
                  <a href="#featured" data-toggle="tab" aria-expanded="false">Sản Phẩm mới </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#top-sellers" data-toggle="tab" aria-expanded="false">Sản phẩm bán chạy </a>
                </li>
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane active in" id="featured">
                  <div class="featured-pro">
                    <div class="slider-items-products">
                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                        @foreach ($new_product as $n)
                          <div class="product-item">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                              @if ($n->promotion_price !=0)
                                <div class="icon-sale-label sale-left">Sale</div>
                              @endif

                              @if($n->new==1)
                                <div class="icon-new-label new-right">New</div>
                              @endif
                                <div class="pr-img-area">
                                  <a title="{{$n->name}}" href="{{route('chi-tiet-sp',$n->id)}}">
                                    <figure>
                                      <img class="first-img" src="main/images/products/{{$n->image}}" alt="html template">
                                      <img class="hover-img" src="main/images/products/{{$n->image}}" alt="html template">
                                    </figure>
                                  </a>
                                  <a href="{{route('themgiohang',$n->id)}}">
                                    <button type="button" class="add-to-cart-mt">
                                      <i class="fa fa-shopping-cart"></i>
                                      <span> Add to Cart</span>
                                    </button>
                                  </a>
                                </div>
                              </div>
                              <div class="item-info">
                                <div class="info-inner">
                                  <div class="item-title">
                                    <a title="{{$n->name}}" href="{{route('chi-tiet-sp',$n->id)}}">{{$n->name}} </a>
                                  </div>
                                  <div class="item-content">
                                    <div class="item-price">
                                      <div class="price-box">
                                      @if ($n->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{number_format($n->price)}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($n->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($n->price)}}</span>
                                        </p>
                                      @endif
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="top-sellers">
                  <div class="top-sellers-pro">
                    <div class="slider-items-products">
                      <div id="top-sellers-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 ">
                        @foreach ($seller as $sl)
                          <div class="product-item">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                              @if ($sl->promotion_price !=0)
                                <div class="icon-sale-label sale-left">Sale</div>
                              @endif

                              @if($sl->new==1)
                                <div class="icon-new-label new-right">New</div>
                              @endif
                                <div class="pr-img-area">
                                  <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$sl->id)}}">
                                    <figure>
                                      <img class="first-img" src="main/images/products/{{$sl->image}}" alt="html template">
                                      <img class="hover-img" src="main/images/products/{{$sl->image}}" alt="html template">
                                    </figure>
                                  </a>
                                  <a href="{{route('themgiohang',$sl->id)}}">
                                    <button type="button" class="add-to-cart-mt">
                                      <i class="fa fa-shopping-cart"></i>
                                      <span> Add to Cart</span>
                                    </button>
                                  </a>
                                </div>

                              </div>
                              <div class="item-info">
                                <div class="info-inner">
                                  <div class="item-title">
                                    <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$sl->id)}}">{{$sl->name}}</a>
                                  </div>
                                  <div class="item-content">

                                    <div class="item-price">
                                      <div class="price-box">
                                      @if ($sl->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{number_format($sl->price)}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($sl->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($sl->price)}}</span>
                                        </p>
                                      @endif
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
              @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- end main container -->

    <!--special-products-->
    <div class="container">
      <div class="special-products">
        <div class="page-header">
          <h2>Sản phẩm đặt biệt</h2>
        </div>
        <div class="special-products-pro">
          <div class="slider-items-products">
            <div id="special-products-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4">
              @foreach($sp_special as $sp)
                <div class="product-item">
                  <div class="item-inner">
                    <div class="product-thumbnail">
                    @if ($sp->promotion_price !=0)
                      <div class="icon-sale-label sale-left">Sale</div>
                     @endif

                    @if($sp->new==1)
                      <div class="icon-new-label new-right">New</div>
                    @endif
                      <div class="pr-img-area">
                        <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$sp->id)}}">
                          <figure>
                            <img class="first-img" src="main/images/products/{{$sp->image}}" alt="html template">
                            <img class="hover-img" src="main/images/products/{{$sp->image}}" alt="html template">
                          </figure>
                        </a>
                        <a href="{{route('themgiohang',$sp->id)}}">
                        <button type="button" class="add-to-cart-mt" >
                          <i class="fa fa-shopping-cart"></i>
                          <span> Add to Cart</span>
                        </button>
                      </a>
                      </div>

                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title">
                          <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$sp->id)}}">{{$sp->name}}</a>
                        </div>
                        <div class="item-content">

                          <div class="item-price">
                            <div class="price-box">
                            @if ($sp->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{number_format($sp->price)}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($sp->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($sp->price)}}</span>
                                        </p>
                                      @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- category area start -->
    <div class="jtv-category-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="jtv-single-cat">
              <h2 class="cat-title">Sản phẩm nổi bật</h2>
              @foreach($sp_nb as $sp)
              <div class="jtv-product">
                <div class="product-img">
                  <a href="{{route('chi-tiet-sp',$sp->id)}}">
                    <img src="main/images/products/{{$sp->image}}" alt="html template" height="116 px">
                    <img class="secondary-img" src="main/images/products/{{$sp->image}}" alt="html template" height="116 px"> </a>
                </div>
                <div class="jtv-product-content">
                  <h3>
                    <a href="{{route('chi-tiet-sp',$sp->id)}}">{{$sp->name}}</a>
                  </h3>
                  <div class="price-box">
                  @if($sp->promotion_price==0)
                      <span class="regular-price">
                      <span class="price">{{$sp->price}}</span>
                       </span>
                        @else
                          <p class="special-price">
                          <span class="price-label">Special Price</span>
                          <span class="price">{{number_format($sp->promotion_price)}}</span>
                          </p>
                          <p class="old-price">
                          <span class="price-label">Regular Price:</span>
                          <span class="price">{{number_format($sp->price)}}</span>
                          </p>
                          @endif
                  </div>
                  <div class="jtv-product-action">
                    <a href="{{route('themgiohang',$sp->id)}}">
                    <div class="jtv-extra-link">
                      <div class="button-cart">
                        <button >
                          <i class="fa fa-shopping-cart" ></i>
                        </button>
                      </div>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="jtv-single-cat">
              <h2 class="cat-title">SẢN PHẨM KHUYẾN MÃI</h2>
              @foreach($sp_promo as $pr)
              <div class="jtv-product">
                <div class="product-img">
                <div class="icon-sale-label sale-left">Sale</div>
                  <a href="{{route('chi-tiet-sp',$pr->id)}}">
                    <img src="main/images/products/{{$pr->image}}" alt="html template" height="116 px">
                    <img class="secondary-img" src="main/images/products/{{$pr->image}}" alt="html template" height="116px"> </a>
                </div>
                <div class="jtv-product-content">
                  <h3>
                    <a href="{{route('chi-tiet-sp',$pr->id)}}">{{$pr->name}}</a>
                  </h3>
                  <div class="price-box">
                    <p class="special-price">
                      <span class="price-label">Special Price</span>
                      <span class="price">{{number_format($pr->promotion_price)}}</span>
                    </p>
                    <p class="old-price">
                      <span class="price-label">Regular Price:</span>
                      <span class="price">{{number_format($pr->price)}}  </span>
                    </p>
                  </div>
                  <div class="jtv-product-action">
                    <a  href="{{route('themgiohang',$pr->id)}}">
                    <div class="jtv-extra-link">
                      <div class="button-cart">
                        <button>
                        
                            <i class="fa fa-shopping-cart"></i>
                          
                        </button>
                      </div>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>

          <!-- service area start -->
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="jtv-service-area">

              <!-- jtv-single-service start -->

              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="main/images/customer-service-icon.png"> </div>
                <div class="service-text">
                  <h2>Dịch vụ hỗ trợ 24/7</h2>
                  <p>
                    <span>Call us 24/7 at 0332566515</span>
                  </p>
                </div>
              </div>
              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="main/images/shipping-icon.png"> </div>
                <div class="service-text">
                  <h2>Free Ship</h2>
                  <p>
                    <span>Khi hóa đơn trên 5 triệu đồng</span>
                  </p>
                </div>
              </div>
              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="main/images/guaratee-icon.png"> </div>
                <div class="service-text">
                  <h2>Bảo Hành</h2>
                  <p>
                    <span>Cam kết chính sách bảo hành</span>
                  </p>
                </div>
              </div>

              <!-- jtv-single-service end -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category-area end -->
    @endsection