@extends('admin.layoutad.admin-layoutad')
@section('title','Thêm User')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Thêm User mới
                </b>
            </div>
            <div class="panel-body">
            @if(Session::has('thongbao'))
              <div class="alert alert-success">
                    {{Session::get('thongbao')}}
              </div>
            @endif
                <div class="row">
                    <form  action="{{route('postUser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="name">Username: </label>
                            <input type="text" name="username" class="form-control" placeholder="Username" >
                        </div>
                        <div class="form-group">
                        <label for="name">Email: </label>
                            <input type="email" name="email" class="form-control" placeholder="Email address" >
                        </div>
                        <div class="form-group">
                        <label for="name">Fullname: </label>
                            <input type="text" name="fullname" class="form-control" placeholder="Họ tên"  >
                        </div>
                        <div class="form-group">
                        <label for="name">Birthday: </label>
                            <input type="date" name="birthdate" class="form-control" required >
                        </div>
                        <div class="form-group">
                        <label for="name">Gender: </label>
                            <select name="gender" class="form-control">
                                <option>-----Chọn giới tính-----</option>
                                <option value="nữ">Nữ</option>
                                <option value="nam">Nam</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="name">Address: </label>
                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ"  >
                        </div>
                        <div class="form-group">
                        <label for="name">Phone: </label>
                            <input type="text" name="phone" class="form-control" placeholder="Điện thoại" >
                        </div>
                        <div class="form-group">
                        <label for="name">Password: </label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" >
                        </div>
                        <div class="form-group">
                        <label for="name">Nhập lại Password: </label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" >
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm </button>
                    </form>
                </div>
               
            </div>
            <a href="{{route('getuser')}}"><button type="submit" class="btn btn-default">Cancel </button></a>
        </div>
    </section>
</div>
@endsection