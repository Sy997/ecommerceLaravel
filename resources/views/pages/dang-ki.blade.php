@extends('layout.index')
@section('title','Accout')
@section('content')
 <!-- Main Container -->
 <section class="main-container col1-layout">
    <div class="main container">
        <div class="page-content">
            <div class="account-login">
             
              <form class="form-signin" method="post" action="{{route('post-dang-ki')}}">
              @csrf
                    <h4>Đăng kí</h4>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                <li> {{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thanhcong'))
                            <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                            </div>
                        @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <label >Tên đăng nhập<span class="required">*</span></label>
                            <input name="username" type="text" class="form-control">

                            <label >Email<span class="required">*</span></label>
                            <input name="email" type="text" class="form-control">

                            <label >Họ tên<span class="required">*</span></label>
                            <input name="hoten" type="text" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label >Ngày sinh<span class="required">*</span></label>
                            <input type="date" name="ngaysinh" class="form-control" required >

                            <label >Giới tính<span class="required">*</span></label>
                                <select name="gender" class="form-control" style="width:50%">
                                    <option>-----Chọn giới tính-----</option>
                                    <option value="nữ">Nữ</option>
                                    <option value="nam">Nam</option>
                                    <option value="khác">Khác</option>
                                </select>

                            <label >Địa chỉ<span class="required">*</span></label>
                            <input name="diachi" type="text" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label >Điện thoại <span class="required">*</span></label>
                            <input  type="text"  name="dienthoai" class="form-control">

                            <label for="password_login">Password<span class="required">*</span></label>
                            <input name="password" type="password" class="form-control">

                            <label for="password_login"> Confirm Password<span class="required">*</span></label>
                            <input name="confirm_password" type="password" class="form-control">
                        </div>        
                </div>
                <br>
                <button class="button"  type="submit" name="dangki"><i class="fa fa-lock"></i>&nbsp; <span>Đăng kí</span></button>
            </form>
        </div>
       
    </div>
</section>
  <!-- Main Container End --> 
@endsection