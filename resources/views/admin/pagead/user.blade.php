@extends('admin.layoutad.admin-layoutad')
@section('title','Quản lí User')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b>Quản lí Users </b>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Mã User</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Ngày tạo</th>
                        <th>Quyền</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($user as $us)
                      <tr>
                        <td>ID0{{$us->id}}</td>
                        <td> {{$us->username}}</td>
                        <td>{{$us->fullname}}</td>
                        <td>{{$us->email}}</td>
                        <td >{{$us->phone}}</td>
                        <td>{{$us->created_at}}</td>
                        <td>{{$us->role}}</td>
                        <td><button class="btn btn-danger btn-sm deleteUser" data-toggle="modal" data-target="#dialog3" data-id="{{$us->id}}">Xoá</button></td>
                        <td><a href="{{route('editUser',$us->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil fo-fw"></i> Sửa</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$user->links()}}
            </div>
        </div>
    </section>
</div>

<div id="dialog3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn xoá User ID0<b id="nameuser">...</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">
                <a href="admin/delete-user" id="deleteIdUser">OK</a>
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    
    </div>
</div>

<script src="admin/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.deleteUser').click(function(){
            var id_user = $(this).attr('data-id') //get 
            var name_user = $('#name-'+id_user).text()
            $('#nameslide').html(name_user)
            $('#deleteIdUser').attr('href',"admin/delete-user/"+id_user) //set
        })
    })
</script>
@endsection
