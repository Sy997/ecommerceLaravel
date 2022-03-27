@extends('layout.index')
@section('title','Contact')
@section('content')
 <!-- Main Container -->
 <section class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-12">
          
          <div id="contact" class="page-content page-contact">
          <div class="page-title">
            <h2>LIÊN HỆ CHÚNG TÔI</h2>
          </div>
            <div id="message-box-conact">Chúng tôi luôn sẵn sàng cho các câu hỏi của bạn</div>
            <div class="row">
              <div class="col-xs-12 col-sm-6" id="contact_form_map">
                <h3 class="page-subheading">Hãy giữ liên lạc</h3>
                <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                <br/>
                <ul>
                  <li>Praesent nec tincidunt turpis.</li>
                  <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                  <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                </ul>
                <br/>
                <ul class="store_info">
                  <li><i class="fa fa-home"></i>7064 Lorem Ipsum Vestibulum 666/13</li>
                  <li><i class="fa fa-phone"></i><span>+ 012 315 678 1234</span></li>
                  <li><i class="fa fa-fax"></i><span>+39 0035 356 765</span></li>
                  <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:support@justtheme.com">support@justthemevalley.com</a></span></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h3 class="page-subheading">Make an enquiry</h3>
                <div class="contact-form-box">
                <form class="form-selector" method="post" action="{{route('post-contact')}}" enctype="multipart/form-data">
                @csrf
                    @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    <li> {{$err}}</li>
                                    @endforeach
                                </div>
                    @endif
                    @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                      {{Session::get('thongbao')}}
                    </div>
                    @endif
                  <div class="form-selector">
                    <label>Tên: </label>
                    <input type="text" class="form-control input-sm"  name="hoten" />
                  </div>
                  <div class="form-selector">
                    <label>Email:</label>
                    <input type="text" class="form-control input-sm" name="email" />
                  </div>
                  <div class="form-selector">
                    <label>Số điện thoại: </label>
                    <input type="text" class="form-control input-sm"  name="phone" />
                  </div>
                  <div class="form-selector">
                    <label>Lời nhắn: </label>
                    <textarea class="form-control input-sm" rows="10"  name="message"></textarea>
                  </div>
                  <div class="form-selector">
                    <button class="button" type="submit"><i class="fa fa-send"></i>&nbsp; <span>Gửi lời nhắn</span></button>
                    &nbsp; </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
  <!-- Main Container End -->
@endsection