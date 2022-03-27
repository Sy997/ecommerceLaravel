@extends('layout.index')
@section('title','Accout')
@section('content')
 <!-- Main Container -->
 <section class="main-container col1-layout">
    <div class="main container">
        <div class="page-content">
            <div class="account-login">
              <div class="box-authentication">
                <form class="form-signin" method="post" action="{{route('post-tai-khoan')}}">
                  @csrf
                    @if(Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag')}}">
                      {{Session::get('mess')}}
                    </div>
                    @endif
                  <h4>Đăng nhập</h4>
                  <p class="before-login-text">Welcome back! Sign in to your account</p>
                  <label for="emmail_login">Email address<span class="required">*</span></label>
                  <input name="email" type="text" class="form-control">
                  <label for="password_login">Password<span class="required">*</span></label>
                  <input name="password" type="password" class="form-control">
                  <p class="forgot-pass"><a href="#">Lost your password?</a></p>
                  <button class="button" type="submit" name="login"><i class="fa fa-lock"></i>&nbsp; <span>Đăng nhập</span></button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
@endsection