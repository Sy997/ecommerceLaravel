@extends('admin.layoutad.admin-layoutad')
@section('title','Quản lí Slide')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b>Quản lí Slide </b>
            </div>
            <div class="panel-body">
            @if(Session::has('thongbao'))
                <div class="alert alert-success">
                    {{Session::get('thongbao')}}
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Mã Slide</th>
                        <th>Hình ảnh</th>
                        <th>Links</th>
                        <th>Tiêu đề</th>
                        <th>Hiển thị </th>
                        <th>Ẩn </th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($slide as $sl)
                      <tr>
                        <td>SL000{{$sl->id}}</td>
                        <td> <img height="100px"  src="admin/slider/{{$sl->image}}" alt=""></td>
                        <td>{{$sl->link}}</td>
                        <td>{{$sl->title}}</td>
                        <td width="50px">
                            <input  type="checkbox" disabled @if($sl->status==1) checked @endif>
                        </td>
                        <td width="50px">
                            <input  type="checkbox" disabled @if($sl->status==0) checked  @endif>
                        </td>
                        <td>
                           
                            <button class="btn btn-danger btn-sm deleteSlide" data-toggle="modal" data-target="#dialog2" data-id="{{$sl->id}}">Xoá</button>
                            <a href="admin/update-slide/{{$sl->id}}"><button class="btn btn-primary btn-sm">Sửa</button></a>
                            
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </section>
</div>


<div id="dialog2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn xoá Slide SL000<b id="nameslide">...</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">
                <a href="admin/delete-slide" id="deleteIdSlide">OK</a>
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    
    </div>
</div>

<script src="admin/js/jquery.js"></script>
<!-- <script>
    $(document).ready(function(){
        $('.deleteSlide').click(function(){
            var id_Slide = $(this).attr('data-id') //get 
            var name_Slide = $('#name-'+id_Slide).text()
            $('#nameslide').html(name_Slide)
            $('#deleteIdSlide').attr('href',"admin/delete-slide/"+id_Slide) //set
        })
    })
</script> -->
@endsection
