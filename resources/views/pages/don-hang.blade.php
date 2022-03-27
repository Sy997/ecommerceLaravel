@extends('layout.index')
@section('title','Đơn hàng')
@section('content')
<!-- Main Container -->


<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Đơn Hàng Của Bạn:  {{Auth::user()->fullname}}</h2>
          </div>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Mã Đơn Hàng </th>
                      <th>Sản phẩm</th>
                      <th>Tổng tiền</th>
                      <th>Ngày đặt</th>
                    </tr>
                  </thead>
                  <tbody>
               
                  @foreach($bills as $key =>$bill)
                    <tr>
                     <td>DH00{{$bill->id_bill}}</td>
                     <td>
                            <li>{{$bill->name}} <b>({{$bill->quantity}})</b></li>
                      </td>
                     <td>{{number_format($bill->total)}}</td>
                     <td>{{date('d-m-Y',strtotime($bill->date_order))}}</td>
                    </tr>
                   @endforeach
                
                  </tbody>
                </table>
              </div>
              <div class="cart_navigation"> 
              <a class="continue-btn" href="{{route('trang-chu')}}"><i class="fa fa-arrow-left"> </i>&nbsp; Trang chủ </a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection