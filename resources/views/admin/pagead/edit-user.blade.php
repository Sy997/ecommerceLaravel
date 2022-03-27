@extends('admin.layoutad.admin-layoutad')
@section('title','Sửa user')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Sửa user--{{$user->username}}
                </b>
            </div>
            <div class="panel-body">
            @if(Session::has('thongbao'))
              <div class="alert alert-success">
                      {{Session::get('thongbao')}}
              </div>
            @endif
                <div class="row">
                    <form  action="{{route('posteditUser',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="name">Username: </label>
                            <input type="text" name="username" class="form-control"value="{{$user->username}}">
                        </div>
                        <div class="form-group">
                        <label for="name">Email: </label>
                            <input type="email" name="email" class="form-control"  value="{{$user->email}}" readonly="">
                        </div>
                        <div class="form-group">
                        <label for="name">Fullname: </label>
                            <input type="text" name="fullname" class="form-control"  value="{{$user->fullname}}" >
                        </div>
                        <div class="form-group">
                        <label for="name">Phone: </label>
                            <input type="text" name="phone" class="form-control"  value="{{$user->phone}}" >
                        </div>
                        <div class="form-group">
                            <label for="name">Password: </label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" disabled>
                        </div>
                        <div class="form-group">
                        <label for="name">Nhập lại Password: </label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" disabled>
                        </div>
                        <label for="name">Quyền: </label>
                            <label for="" class="radio-inline"><input type="radio" value="1" @if($user->role =='admin'){{"checked"}}@endif>  
                            Admin</label>
                            <label for="" class="radio-inline"><input type="radio" value="2" @if($user->role == 'cashser'){{"checked"}}@endif>  Casher</label>
                            <label for="" class="radio-inline"><input type="radio" value="3" @if($user->role == 'gust'){{"checked"}}@endif>  Gust</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Sửa </button>
                        
                    </form>
                    <a href="{{route('getuser')}}"><button type="submit" class="btn btn-default">Cancel </button></a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection