@extends('admin.layoutad.admin-layoutad')
@section('title','Cập nhật thông tin sản phẩm '.$product->name)
@section('content')

<script src="ckeditor/ckeditor.js"></script>
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                Cập nhật thông tin sản phẩm <i>{{$product->name}}</i>
                </b>
            </div>
            <div class="panel-body">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <div class="row">
                    <form  action="{{route('updateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Tên sản phẩm:</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Chọn cấp cha:</label>
                            <select name="id_type" class="form-control" id="level-one">
                                <option value="">---Chọn loại---</option>
                                @foreach($levelOne as $l1)
                                <option value="{{$l1->id}}">{{$l1->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Chọn cấp con:</label>
                            <select name="id_type" class="form-control" id="level-two">
                                @foreach($levelTwo as $l2)
                                <option value="{{$l2->id}}" @if($l2->id==$product->id_type) selected @endif >{{$l2->name}}></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Đơn giá:</label>
                        <input type="text" class="form-control" name="price" id="pwd" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Đơn giá khuyến mãi:</label>
                            <input type="text" class="form-control" name="promotion_price" value="{{$product->promotion_price}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Khuyến mãi kèm theo:</label>
                            <textarea rows="5" class="form-control"  name="promotion" id="promotion">{{$product->promotion}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Thông tin chi tiết:</label>
                            <textarea rows="5" class="form-control" name="detail" id="detail">{{$product->detail}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình sản phẩm:</label>
                            <input type="file" name="image">
                            <br>
                            <div>
                                <img height="100px" src="admin//products/{{$product->image}}" alt="">
                            </div>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" name="status" @if($product->status==1) checked @endif> Sản phẩm đặc biệt</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="new"  @if($product->new==1) checked @endif> Sản phẩm mới</label>
                          </div>
                          <div class="checkbox">
                            <label>
                                <input type="checkbox" name="deleted"  @if($product->deleted==1) checked @endif> Xoá sản phẩm</label>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="admin/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#level-one').change(function(){
            var idType = $(this).val()
            $.ajax({
                //url:"admin/select-level-two",
                url:"{{route('getl2')}}",
                type: 'GET',
                data:{
                    id:idType // $_GET['id'] ~ $req->id
                },
                success:function(res){
                    console.log(res)
                    if($.trim(res)=='nolevel2'){
                        $('#level-two').html('<select class="form-control" id="level-two"><option disabled>Không tồn tại cấp 2</option></select>')
                    }
                    else{
                        $('#level-two').html(res)
                        // $('#level-one').attr('name','')
                    }
                },
                error:function(){
                    console.log('errrr!!')
                }
            })
        })
    })
</script>

<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('detail')
    CKEDITOR.replace('promotion')
</script>
@endsection