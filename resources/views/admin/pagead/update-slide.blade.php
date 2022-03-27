@extends('admin.layoutad.admin-layoutad')
@section('title','Thêm Slide')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Sửa Slide--{{$slide->title}}

                </b>
            </div>
            <div class="panel-body">
                @if(Session::has('thongbao'))
                <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                </div>
                @endif
                <div class="row">
                    <form  action="{{route('postupdateSlide',$slide->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Id :</label>
                        <input type="text" class="form-control" name="id" value="{{$slide->id}}" >
                        </div>
                        <div class="form-group">
                          <label for="name">Title slide : </label>
                        <input type="text" class="form-control" name="title" value="{{$slide->title}}" >
                        </div>
                        <div class="form-group">
                          <label for="name">Links : </label>
                        <input type="text" class="form-control"  name="links" value="{{$slide->link}}">
                        </div>
                       
                        <div class="form-group">
                            <label>Hình silde:</label>
                            <p><img width="500px" src="admin/slider/{{$slide->image}}" alt=""></p>
                            <input type="file" name="image">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Sửa </button>
                        
                    </form>
                    <br>
                    <a href="{{route('getslide')}}"><button type="submit" class="btn btn-default">Cancel </button></a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection