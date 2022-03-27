@extends('admin.layoutad.admin-layoutad')
@section('title','Thêm Slide')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Thêm Slide mới
                </b>
            </div>
            <div class="panel-body">
            @if(Session::has('thongbao'))
              <div class="alert alert-success">
                      {{Session::get('thongbao')}}
              </div>
            @endif
                <div class="row">
                    <form  action="{{route('postSlide')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Id :</label>
                        <input type="text" class="form-control" name="id" >
                        </div>
                        <div class="form-group">
                          <label for="name">Title slide : </label>
                        <input type="text" class="form-control" name="title" >
                        </div>
                        <div class="form-group">
                          <label for="name">Links : </label>
                        <input type="text" class="form-control"  name="links" >
                        </div>
                       
                        <div class="form-group">
                            <label>Hình silde:</label>
                            <input type="file" name="image">
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="show" > Hiển thị</label>
                        </div>
  
                        <button type="submit" class="btn btn-primary">Thêm </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection