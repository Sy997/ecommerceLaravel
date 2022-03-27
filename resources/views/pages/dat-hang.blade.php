@extends('layout.index')
@section('title','Đặt hàng')
@section('content')
<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Đặt hàng</h2>
          <!-- @if (empty(Auth::user()))
          <div class="alert alert-danger">Bạn chưa đăng nhập. Vui lòng đăng nhập !!! </div>
          @endif -->

          @if (Session::has('thongbao'))
          <div class="alert alert-success">{{Session::get('thongbao')}} </div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger">{{Session::get('error')}} </div>
          @endif
        </div>
            <form  action=" {{route('dat-hang')}}" method="POST" >
            @csrf
                <div class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-sm-4">
                                <label for="last_name" class="required">Họ tên</label>
                                <input type="text" name="fullname" class="input form-control" id="last_name"  value="@if(!empty(Auth::user())) {{Auth::user()->fullname}} @endif" required>
                            </div><!--/ [col] -->

                            <div class="col-sm-4">
                                <label for="last_name" class="required">Giới tính</label>
                                <input type="text" name="gender" class="input form-control" id="gender"  value="@if(!empty(Auth::user())) {{Auth::user()->gender}} @endif"  required>
                            </div>

                            <div class="col-sm-4">
                                <label for="email_address" class="required">Email </label>
                                <input type="email" class="input form-control" name="email" id="email_address" value="@if(!empty(Auth::user())) {{Auth::user()->email}} @endif" required>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row"> 
                            <div class="col-xs-6">

                                <label for="address" class="required">Address</label>
                                <input type="text" class="input form-control" name="address" id="address"   value=" @if(!empty(Auth::user())) {{Auth::user()->address}} @endif"  required>

                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="telephone" class="required">Điện thoại</label>
                                <input class="input form-control" type="text" name="phone" id="telephone"   value="@if(!empty(Auth::user())) {{Auth::user()->phone}} @endif"  required>
                            </div><!--/ [col] -->
                        </li><!-- / .row -->
                        <li class="row">
                            <div class="col-sm-12">
                                <label for="fax">Ghi chú</label>
                                <textarea class="input form-control" name="note" id="note"></textarea>
                            </div><!--/ [col] -->

                        </li><!--/ .row -->

                        <li>
                            <button type="submit" name="btnCheckout" class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
                        
                        </li>
                    </ul>
                </div>
            </form>
        </div>
      </div> 
    </div>
  </div>
  </section>
  <!-- Main Container End -->
@endsection