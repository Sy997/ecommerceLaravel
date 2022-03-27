<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\Categories;
use App\User;
use App\Bills;
use App\PageUrl;
use App\slide;
use App\contact;
use Hash;
use Auth;
use Session;
use App\Helpers\Helpers;

class AdminController extends Controller
{
    //
    function getLogin(){
        return view('admin.pagead.login');
    }
    function getRegister(){
        return view('admin.pagead.register');
    }
    function postRegister(Request $req){
        $validator = \Validator::make($req->all(), [
            'username' => 'required|unique:users|max:50|min:10',
            'email' => 'required|unique:users|email',
            'gender' => "required",
            'password'=>'required|min:6',
            'confirm_password' => 'same:password'
        ],[
            'username.unique' => "Username đã có người sử dụng",
            'email.email' => "Email ko đúng định dạng",
            'confirm_password.same' => 'Mật khẩu không giống nhau'
        ]);

        if ($validator->fails()) {
            return redirect()->route('get-register')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->fullname = $req->fullname;
        $user->birthdate = date('Y-m-d',strtotime($req->birthdate));
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('getlogin')->with('success','Đăng kí thành công!');
    }

    function postLogin(Request $req){
        $data = [
            'email' => $req->email,
            'password' => $req->password
        ];
        if(Auth::attempt($data)){
            //return redirect()->route('home-admin');
            return redirect()->route('home-admin');
        }
        return redirect()->back()->with('error',' Sai thông tin đăng nhập!');
    }
    function getLogout(){
        Auth::logout();
        return redirect()->route('getlogin');
        
    }

    function getHome(){
        $user = Auth::user();
        $status = 1;
        $bills = Bills::with('customers','bill_detail','bill_detail.Products')
                ->where('status',$status)->paginate(5);
        return view('admin.pagead.home',compact('bills','status'));
    }

    function getUpdateBill($id){
        $bill = Bills::where('id',$id)->first();
        if($bill){
            $bill->status = 2; //0:KH chua xac nhan| 1:KH da xac nhan | 2:admin da giao hang | 3:DH bi huy
            $bill->save();
            return redirect()->route('home-admin')->with('success','Cập nhật thành công');
        }
        else{
            return redirect()->route('home-admin')->with('error',"Không tìm thấy đơn hàng HD000$id");
        }
    }

    function getupdateBills($id){
        $bills=Bills::where('id',$id)->first();
        if($bills){
            $bills->status =1;
            $bills->save();
            return \redirect()->route('home-admin')->with('thongbao','Xác nhận đơn hàng thành công !!!');
        }
        else{
            return redirect()->route('home-admin')->with('error',"Không tìm thấy đơn hàng HD000$id");
        }
    }

    function getBillsByStatus($status){
        $bills = Bills::with('customers','bill_detail','bill_detail.Products')          
                ->where('status',$status)->orderBy('id','DESC')->paginate(5);
        // dd($bills);
        return view('admin.pagead.home',compact('bills','status'));
    }

    function getListProduct($idtype){
        $nameType = Categories::where('id',$idtype)->value('name');
        $products = Products::where('id_type',$idtype)->paginate(10);
        return view('admin.pagead.list-product',compact('products','nameType'));
    }
    function getDeleteProduct($id){
        $product = Products::findOrFail($id);
        if($product){
            // $product->delete();
            $product->deleted = 1;
            $product->save();
            return redirect()->route('listProduct',$product->id_type)
            ->with('success','Xoá thành công');
        }
        else{
            return redirect()->back()
            ->with('error','Không tìm thấy sản phẩm');
        }
    }

    function getUpdateProduct($id){
        $product = Products::where('id',$id)->first();
        $levelOne = Categories::where('id_parent',NULL)->get();
        $idType = Categories::where('id',$product->id_type)->value('id_parent');
        $levelTwo = Categories::where('id_parent',$idType)->get();

        if($product){
            return view('admin.pagead.edit-product',compact('product','levelOne','levelTwo'));
        }
        return redirect()->back()->with('error','Không tìm thấy sản phẩm');
    }

    function getLevelTwo(Request $req){
        $levelTwo = Categories::where('id_parent',$req->id)->get();
        if(empty($levelTwo->toArray())){
            echo "nolevel2";
        }
        else{
            return view('admin.ajax.leveltwo',compact('levelTwo'));
        }
    }

    function postUpdateProduct(Request $req){
        //dd($req->input());
        $product = Products::findOrFail($req->id);
        if($product){
            $product->id_type = $req->id_type;
            $product->name = $req->name;
            $product->detail = $req->detail;
            $product->price = $req->price;
            $product->promotion_price = $req->promotion_price;
            $product->promotion = $req->promotion;
            $product->status = isset($req->status) && $req->status=="on" ? 1 : 0;
            $product->new = isset($req->new) && $req->new=="on" ? 1 : 0;
            $product->deleted = isset($req->deleted) && $req->deleted=="on" ? 1 : 0;
            $product->update_at = date('Y-m-d',time());
            if($req->hasFile('image')){
                $image = $req->file('image');
                $name = time().$image->getClientOriginalName();
                $image->move('admin/products',$name);

                $product->image = $name;
            } 
            $product->save(); 
            
            $url = PageUrl::findOrFail($product->id_url);
            $helper = new Helpers;
            $url->url = $helper->changeTitle($product->name);
            $url->save();
            return redirect()->route('listProduct',$product->id_type)->with('success','Update thành công');
        }
        else{
            return redirect()->back()->with('error','Không tìm thấy sản phẩm');
        }
        
    }

    function getAddProduct(){
        $levelOne = Categories::where('id_parent',NULL)->get();
        return view('admin.pagead.add-product',compact('levelOne'));
    }

    function postAddProduct(Request $req){
        $url = new PageUrl;
        $helper = new Helpers;
        $url->url = $helper->changeTitle($req->name);
        $url->save();

        $product = new Products;
        $product->id_url = $url->id;
        $product->id_type = $req->id_type;
        $product->name = $req->name;
        $product->detail = $req->detail;
        $product->price = $req->price;
        $product->promotion_price = $req->promotion_price;
        $product->promotion = $req->promotion;
        $product->status = isset($req->status) && $req->status=="on" ? 1 : 0;
        $product->new = isset($req->new) && $req->new=="on" ? 1 : 0;
        $product->deleted = isset($req->deleted) && $req->deleted=="on" ? 1 : 0;
        $product->update_at = date('Y-m-d',time());
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time().$image->getClientOriginalName();
            $image->move('admin/products',$name);
            $product->image = $name;
        } 
        else{
            
            $url->delete();
            return redirect()->back()->with('error','Vui lòng chọn ảnh')->withInput($req->all());

        }
        $product->save(); 
        return redirect()->route('listProduct',$product->id_type)->with('success','Thêm mới thành công');
    }

    function getSlide(){
        $slide=slide::all();
        //dd($slide);
        return view('admin.pagead.slide',\compact('slide'));

    }

    function getDeleteSlide($id){
        $Slide=slide::find($id);
        
    }

    function getAddSlide(){
        return view('admin.pagead.add-slide');
    }

    function postAddSlide(Request $req){
        $slide= new slide;
        $slide->id=$req->id;
        $slide->title=$req->title;
        $slide->link=$req->links;
        $slide->status = isset($req->show) && $req->show=="on" ? 1 : 0;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time().$image->getClientOriginalName();
            // $image->move('admin/slider',$name);
            $image->move('main/images/slider',$name);
            $slide->image = $name;
        } 
        else{
            
            $url->delete();
            return redirect()->back()->with('error','Vui lòng chọn ảnh')->withInput($req->all());

        }
        $slide->save();
        return \redirect()->route('addSlide')->with('thongbao','Thêm slide mới thành công !');

    }

    function getupdateSlide($id){
        $slide=slide::find($id);
        return \view('admin.pagead.update-slide',\compact('slide'));
    }

    function postupdateSlide(Request $req, $id){
        $slide= slide::find($id);
        $slide->id=$req->id;
        $slide->title=$req->title;
        $slide->link=$req->links;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time().$image->getClientOriginalName();
            $image->move('admin/slider',$name);
            $image->move('main/images/slider',$name);
            $slide->image = $name;
        } 
        
        $slide->save();
        return \redirect()->route('updateSlide',$slide->id)->with('thongbao','Sửa slide thành công !');
    }

    public function getxoaSlide ($id){
        $slide=slide::find($id);
        $slide->delete();
        return \redirect()->route('getslide')->with('thongbao','Bạn đã xóa thành công !');
    }

    //admin/user
    function getUser(){
        $user=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('role','role_user.role_id','role.id')
        ->select('users.*','role.role')
        ->paginate(10);
        return view('admin.pagead.user',\compact('user'));
    }

    function getAddUser(){
        return view ('admin.pagead.add-user');
    }

    function postAddUser(Request $req){
        $validator = \Validator::make($req->all(), [
            'username' => 'required|unique:users|max:50|min:10',
            'email' => 'required|unique:users|email',
            'gender' => "required",
            'password'=>'required|min:6',
            'confirm_password' => 'same:password'
        ],[
            'username.unique' => "Username đã có người sử dụng",
            'email.email' => "Email ko đúng định dạng",
            'confirm_password.same' => 'Mật khẩu không giống nhau'
        ]);

        if ($validator->fails()) {
            return redirect()->route('addUser')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->fullname = $req->fullname;
        $user->birthdate = date('Y-m-d',strtotime($req->birthdate));
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('addUser')->with('success','Đăng kí thành công!');

    }

    function geteditUser($id){

        $user=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('role','role_user.role_id','role.id')
        ->select('users.*','role.role')
        ->get();
        $user=User::find($id);
        return view ('admin.pagead.edit-user',compact('user'));
    }

    function posteditUser(Request $req, $id){
        $user=User::find($id);
        $user->username=$req->username;
        $user->fullname=$req->fullname;
        $user->phone=$req->phone;
        
        $user->save();
        return \redirect()->route('editUser',$user->id)->with('thongbao','Sửa thành User thành công ');
    }

    public function getdeleteUser($id){
        $user=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('role','role_user.role_id','role.id')
        ->select('users.*','role.role')
        ->where('users.id','=',$id)
        ->delete();
       
        
        return redirect()->route('getuser')->with('thongbao','Bạn đã xóa User thành công');
    }

    //contact
    public function getContact(){
        $contact=contact::all();
        //dd($slide);
        return view('admin.pagead.contact',\compact('contact'));

    }


}
