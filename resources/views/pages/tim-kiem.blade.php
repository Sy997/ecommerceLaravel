@extends('layout.index')
@section('title','Tìm kiếm')
@section('content')
 <!-- Main Container -->
 <div class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="main/images/cat-slider-img1.jpg">
                      </a>
                      <div class="inner-info">
                        <div class="cat-img-title">
                          <span>Our new range of</span>
                          <h2 class="cat-heading">
                            <strong>Smartphone</strong>
                          </h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                          <a class="info" href="#">Shop Now</a>
                        </div>
                      </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="main/images/cat-slider-img2.jpg">
                      </a>
                    </div>

                    <!-- End Item -->

                  </div>
                </div>
              </div>
            </div>
            <div class="shop-inner">
              <div class="page-title">
                <h2>Đã tìm thấy {{count($product)}} sản phẩm </h2>
              </div>

              <div class="product-grid-area">
                <ul class="products-grid">
                @foreach($product as $p)
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                        @if ($p->promotion_price !=0)
                                <div class="icon-sale-label sale-left">Sale</div>
                              @endif

                              @if($p->new==1)
                                <div class="icon-new-label new-right">New</div>
                              @endif
                          <div class="pr-img-area">
                            <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$p->id)}}">
                              <figure>
                                <img class="first-img" src="main/images/products/{{$p->image}}" alt="">
                                <img class="hover-img" src="main/images/products/{{$p->image}}" alt="">
                              </figure>
                            </a>
                            <a href="{{route('themgiohang',$p->id)}}">
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
                              <a title="Ipsums Dolors Untra" href="{{route('chi-tiet-sp',$p->id)}}">{{$p->name}} </a>
                            </div>
                            <div class="item-content">

                              <div class="item-price">
                                <div class="price-box">
                                @if ($p->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{number_format($p->price)}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($p->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($p->price)}}</span>
                                        </p>
                                      @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
                </ul>
              </div>
              <div class="pagination-area ">
               
              </div>
            </div>
          </div>
          <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="block category-sidebar">
              <div class="sidebar-title">
                <h3>Categories</h3>
              </div>
              <ul class="product-categories">
                <li class="cat-item current-cat cat-parent">
                  <a href="shop_grid.html">Women</a>
                  <ul class="children">
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                        </li>
                        <li class="cat-item cat-parent">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                          <ul style="display: none;" class="children">
                            <li class="cat-item">
                              <a href="shop_grid.html">
                                <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                            </li>
                            <li class="cat-item">
                              <a href="shop_grid.html">
                                <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; backpack</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Jewellery</a>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Swimwear</a>
                    </li>
                  </ul>
                </li>
                <li class="cat-item cat-parent">
                  <a href="shop_grid.html">Men</a>
                  <ul class="children">
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Casual</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Designer</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Evening</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Hoodies</a>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Jackets</a>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Shoes</a>
                    </li>
                  </ul>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">Electronics</a>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">Furniture</a>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">KItchen</a>
                </li>
              </ul>
            </div>
            <div class="block shop-by-side">
              <div class="sidebar-bar-title">
                <h3>Shop By</h3>
              </div>
              <div class="block-content">
                <p class="block-subtitle"></p>
                <div class="layered-Category">
                  <h2 class="saider-bar-title">Danh mục</h2>
                  <div class="layered-content">
                    <ul class="check-box-list">
                      <li>
                        <input type="checkbox" id="jtv1" name="jtvc">
                        <label for="jtv1">
                          <span class="button"></span> Camera & Photo
                          <span class="count">(12)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv2" name="jtvc">
                        <label for="jtv2">
                          <span class="button"></span> Computers
                          <span class="count">(18)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv3" name="jtvc">
                        <label for="jtv3">
                          <span class="button"></span> Apple Store
                          <span class="count">(15)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv4" name="jtvc">
                        <label for="jtv4">
                          <span class="button"></span> Car Electronic
                          <span class="count">(03)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv5" name="jtvc">
                        <label for="jtv5">
                          <span class="button"></span> Accessories
                          <span class="count">(04)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv7" name="jtvc">
                        <label for="jtv7">
                          <span class="button"></span> Game & Video
                          <span class="count">(07)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv8" name="jtvc">
                        <label for="jtv8">
                          <span class="button"></span> Best selling
                          <span class="count">(05)</span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
            <div class="block product-price-range ">
              <div class="sidebar-bar-title">
                <h3>Price</h3>
              </div>
              <div class="block-content">
                <div class="slider-range">
                  <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50"
                    data-value-max="350"></div>
                  <div class="amount-range-price">Range: $10 - $550</div>
                  <ul class="check-box-list">
                    <li>
                      <input type="checkbox" id="p1" name="cc" />
                      <label for="p1">
                        <span class="button"></span> $20 - $50
                        <span class="count">(0)</span>
                      </label>
                    </li>
                    <li>
                      <input type="checkbox" id="p2" name="cc" />
                      <label for="p2">
                        <span class="button"></span> $50 - $100
                        <span class="count">(0)</span>
                      </label>
                    </li>
                    <li>
                      <input type="checkbox" id="p3" name="cc" />
                      <label for="p3">
                        <span class="button"></span> $100 - $250
                        <span class="count">(0)</span>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="single-img-add sidebar-add-slider ">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="main/images/add-slide1.jpg" alt="slide1">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">shopping Now</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="main/images/add-slide2.jpg" alt="slide2">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Smartwatch Collection</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">All Collection</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="main/images/add-slide3.jpg" alt="slide3">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Summer Sale</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
    <!-- Main Container End -->
 @endsection