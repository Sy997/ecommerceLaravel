@extends('layout.index')
@section('title','Chi tiết sản phẩm')
@section('content')
 <!-- Main Container -->
 <script type="text/javascript">
  function cong (){
    var result = document.getElementById('qty');
    var qty = result.value; 
    if( !isNaN( qty )) result.value++;
    return false;
  }

  function tru (){
    var result = document.getElementById('qty');
    var qty = result.value; 
    if( !isNaN( qty ) && qty <= 1){
      result.value;
    }
    else result.value--; 
  }

 </script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#addcart").click(function(){
     alert(111);
    });
  });
</script>


 <div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
          @foreach($product as $pro)
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                @if ($pro->promotion_price !=0)
                              <div class="icon-sale-label sale-left">Sale</div>
                @endif
                              @if($pro->new==1)
                              <div class="icon-new-label new-right">New</div>
                              @endif
                <div class="large-image">
                <a href="images/products/{{$pro->image}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20" style="position: relative; display: block;">
                    <img class="zoom-img" src="main/images/products/{{$pro->image}}" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
                <div class="product-name">
                  <h1>{{$pro->name}}</h1>
                </div>
                <div class="price-box">
                @if ($pro->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{number_format($pro->price)}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($pro->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($pro->price)}}</span>
                                        </p>
                                      @endif
                </div>

                <div class="short-description">
                  <h2>Chi tiết sản phẩm</h2>
                  <p>{{$pro->detail}}</p>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Số lượng:</label>
                      <div class="numbers-row">
                        <div class="dec qtybutton" onClick="tru()">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty" >
                        <div class="inc qtybutton" onClick="cong()">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <a  href="{{route('themgiohang',$pro->id)}}">
                      <button class="button pro-add-to-cart" id="addcart" title="Add to Cart" type="button" >
                        <span>
                          <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                      </button>
                    </a>
                  </form>
                </div>

              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Sản phẩm cùng loại</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                @foreach($sptt as $sp1)
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                      @if ($sp1->promotion_price !=0)
                                <div class="icon-sale-label sale-left">Sale</div>
                              @endif

                              @if($sp1->new==1)
                                <div class="icon-new-label new-right">New</div>
                              @endif
                        <div class="pr-img-area">
                          <img class="first-img" src="main/images/products/{{$sp1->image}}" alt="">
                          <img class="hover-img" src="main/images/products/{{$sp1->image}}" alt="">
                          <a href="{{route('themgiohang',$sp1->id)}}">
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
                            <a title="Ipsums Dolors Untra" href="single_product.html">{{$sp1->name}}</a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                              @if ($sp1->promotion_price==0)
                                        <span class="regular-price">
                                          <span class="price">{{$sp1->price}}</span>
                                        </span>
                                      @else
                                      <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price">{{number_format($sp1->promotion_price)}}</span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price">{{number_format($sp1->price)}}</span>
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
    </section>
    <!-- Related Product Slider End -->

@endsection
