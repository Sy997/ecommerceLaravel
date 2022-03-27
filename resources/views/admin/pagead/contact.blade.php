@extends('admin.layoutad.admin-layoutad')
@section('title','Quản lí Contact')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b>Quản lí Contact </b>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Mã </th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nội dung </th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($contact as $c)
                      <tr>
                        <td>CT000{{$c->id}}</td>
                        <td>{{$c->ten}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->phone}}</td>
                        <td>{{$c->message}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </section>
</div>

@endsection
