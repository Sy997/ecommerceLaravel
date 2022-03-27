@extends('admin.layoutad.admin-layoutad')
@section('title','Trang chủ')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    @if($status==0)
                        Danh sách đơn hàng chưa xác nhận
                    @elseif($status==1)
                        Quản lý đơn hàng mới (Đơn hàng đã xác nhận) 
                    @elseif($status==2)
                        Danh sách đơn hàng đã hoàn tất 
                    @else 
                        Danh sách đơn hàng bị huỷ
                    @endif
                </b>
            </div>
            <div class="panel-body">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('thongbao'))
                <div class="alert alert-success">
                    {{Session::get('thongbao')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                      <tr>
                          <th>Mã đơn hàng</th>
                        <th>Tên khách hàng - SĐT</th>
                        <th>Ngày đặt</th>
                        <th>Sản phẩm (Số lượng)</th>
                        <th>Tổng tiền(chưa giảm)</th>
                        <th>Tổng tiền thanh toán</th>
                        <th>Note</th>
                        @if($status==1)
                        <th>Tuỳ chọn</th>
                        @endif
                        @if($status==0)
                        <th>Tuỳ chọn</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($bills as $b)
                      <tr>
                      <td>DH000{{$b->id}}</td>
                        <td>
                            {{$b->customers->name}}
                            <br>
                            {{$b->customers->phone}}
                        </td>
                        <td>{{date('d-m-Y',strtotime($b->date_order))}}</td>
                        <td>
                            @foreach($b->bill_detail as $detail)
                            <li>{{$detail->Products->name}} <b>({{$detail->quantity}})</b></li>
                            @endforeach
                        </td>
                        <td>{{number_format($b->total)}}</td>
                        <td>{{number_format($b->promt_price)}}</td>
                        <td>{{$b->note}}</td>
                        @if($status==1)
                        <td>
                            <button class="btn btn-primary btn-sm updateBill" data-toggle="modal" data-target="#myModal" data-id="{{$b->id}}">Đã giao</button>
                            <br>
                            <button class="btn btn-default btn-sm">Huỷ</button>
                        </td>
                        @endif
                        @if($status==0)
                        <td>
                            <button class="btn btn-primary btn-sm editBill" data-toggle="modal" data-target="#dialog1" data-id="{{$b->id}}">Xác nhận</button>
                            <br>
                            <button class="btn btn-default btn-sm">Huỷ</button>
                        </td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                {{$bills->links()}}
            </div>
        </div>
    </section>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn chuyển <b id="idBill">DH000</b> sang đã giao?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">
                <a href="admin/update-bill" id="addIdBill">OK</a>
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    
    </div>
</div>

<!-- dialog xác nhận -->
<div id="dialog1" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn chuyển <b id="idbill">DH000</b> sang trạng thái xác nhận đơn hàng ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">
                <a href="admin/update-bills" id="add_idbill">OK</a>
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    
    </div>
</div>


<script src="admin/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.updateBill').click(function(){
            var idBill = $(this).attr('data-id') //get 
            $('#addIdBill').attr('href',"admin/update-bill-"+idBill) //set
        })
    })
</script>

<script>
    $(document).ready(function(){
        $('.editBill').click(function(){
            var id_bill = $(this).attr('data-id') //get 
            $('#add_idbill').attr('href',"admin/update-bills/"+id_bill) //set
        })
    })
</script>
@endsection