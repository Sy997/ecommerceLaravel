@extends('layout.index')
@section('title','Giỏ hàng')
@section('content')
<!-- Main Container -->

<script type="text/javascript">
  function updatecart(qty,rowId){
   $.get(
        '{{asset('update')}}',
        {qty:qty,rowId:rowId},
        function (){
          location.reload();
        }
   );
  }
</script>


<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Giỏ hàng</h2>
          </div>
            @if (Session::has('cart'))
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Sản phẩm </th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($productCart as $product)
                    <tr>
                      <td class="cart_product"><a href="#"><img src="main/images/products/{{$product['item']['image']}}" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#">{{$product['item']['name']}}</a></p></td>
                      <td class="price">
                        @if($product['item']['promotion_price'] != $product['item']['price'])
                        <span>{{number_format($product['item']['promotion_price'])}}</span>
                        <br>
                        <del style="color:darkgrey">{{ number_format($product['item']['price'])}}</del>
                        @else
                        <span>{{ number_format($product['item']['promotion_price'])}}</span>
                        @endif
                      </td>
                      <td class="qty"><input class="form-control input-sm" type="text" value="{{$product['qty']}}" onchange="updatecart(this.value,'{{$product['item']['id']}}')"></td>
                      <td class="price"><span>{{ number_format($product['discountPrice'])}}</span></td>
                      <td class="action"><a href="{{route('xoagiohang',$product['item']['id'])}}"><i class="icon-close"></i></a></td>
                    </tr>
                 @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Đơn giá gốc (Chưa khuyến mãi)</td>
                      <td colspan="2">{{number_format(Session('cart')->totalPrice)}}</td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Tổng thanh toán</strong></td>
                      <td colspan="2"><strong>{{number_format(Session('cart')->promtPrice)}}</strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> 
              <a class="continue-btn" href="{{route('trang-chu')}}"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua sắm </a> 
              <a class="checkout-btn" href="{{route('dat-hang')}}"><i class="fa fa-check"></i> Đặt hàng</a> 
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection