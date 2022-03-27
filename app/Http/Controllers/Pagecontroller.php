<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\slide;
use App\contact;
use App\Products;
use App\BillDetail;
use App\Categories;
use App\Cart;
use App\Customers;
use App\Bills;
use Session;
use App\User;
use Hash;
use Auth;
use Mail;


class Pagecontroller extends Controller
{
    //Hien thi trang chu
    public function getIndex(){
        $slide= slide:: all();
        $new_product=Products::where ('new',1)->take(8)->get();
        $seller=DB::table('products')                         
                            ->join('bill_detail','products.id','=','bill_detail.id_product')
                            ->select('products.*',DB::raw('sum(bill_detail.quantity) as Qty'))
                            ->orderBy('Qty','desc')
                            ->groupBy('bill_detail.id_product')
                            ->get();
        $sp_special=Products::where('status',1)->take(8)->get();
        $sp_promo=Products::where('promotion_price','!=',0)->take(4)->get();
        $sp_nb=Products::orderBy('price','asc')->take(4)->select('*')->get();
        // dd($sp);
        // // dd($sp_special);
        // // dd($seller);
        return view('pages.trangchu',compact('slide','new_product','seller','sp_special','sp_promo','sp_nb'));
    }

    //Hien thi các trang khác 
    public function getLoaiSP($id){
        $cart = Session::get('cart');
        $loai_sp=Products::select('*')->where('id_type',$id)->paginate(12);
        $getName=Categories::where('id',$id)->first();
        // dd ($cart);
        return view('pages.loai-san-pham',compact('loai_sp','getName','cart'));
    }

    //Hiển thị chi tiết sản phẩm
    public function getChitietSP(Request $req){
        $product=Products::where('id',$req->id)->get();
        $sptt=Products::where('id_type',$req->id)->get();
        // dd($cart);
        return view('pages.chi-tiet-san-pham',compact('product','sptt'));
    }

    //Hiển thị giỏ hàng
    public function getGiohang(){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);

        // dd($cart);
        return view('pages.gio-hang',compact('cart'));
    }

    public function getAddCart(Request $req,$id){
        $product=Products::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,1);
        $req->session()->put('cart',$cart);
        // dd($cart);
        return redirect()->back();

    }

    public function getDelItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function UpdateQtyItem($id,$qty){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->update($id,$qty);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function getUpdateCart(Request $req){
        $product=Products::find($req->rowId);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        // dd($cart);
        $cart->update($product,$req->qty);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    //Hiển thị trang đặt hàng
    public function getDathang(){
        return view('pages.dat-hang');
    }

    public function postDathang(Request $req){
        
            if(!empty(Auth::user())){
                $c_email=Auth::user()->email;
                $c_id=Auth::user()->id;
                $c_name=Auth::user()->name;

                $cart = Session::get('cart');
                $customer= new Customers;
                $customer->name=$req->fullname;
                $customer->gender=$req->gender;
                $customer->email=$req->email;
                $customer->address=$req->address;
                $customer->phone=$req->phone;
                $customer->note=$req->note;
                $customer->save();

                $bill= new Bills;
                $bill->id_customer=$customer->id;
                $bill->date_order=date('Y-m-d');
                $bill->total=$cart->totalPrice;
                $bill->note=$req->note;
                $bill->save();
                

                foreach($cart->items as $key=>$value){
                $bill_detail= new BillDetail;
                $bill_detail->id_bill=$bill->id;
                $bill_detail->id_product=$key;
                $bill_detail->quantity=$value['qty'];
                $bill_detail->price=($value['price']/$value['qty']);
                $bill_detail->save();
                }

                Mail::send('email.email',[
                    'c_name'=> $c_name,
                    'items'=>$cart->items,

                ],function($mail) use ($c_email,$c_name){
                    $mail->to($c_email,$c_name);
                    $mail->from('kien20397@gmail.com');
                    $mail->subject('Thông báo đặt hàng từ MyStore');
                });
                Session::forget('cart');
                return redirect()->back()->with('thongbao','Đặt hàng thành công !');
            }
        return redirect()->back()->with('error','Bạn chưa đăng nhập. Vui lòng đăng nhập !');
      
    
       
    }

    //Hiển thị trang Tài khoản
    public function getTaikhoan(){

        return view('pages.tai-khoan');
    }

    public function postTaikhoan(Request $req){
        $validator = \Validator::make($req->all(), [
            'email' => 'required|unique:users|email',
            'password'=>'required|min:6',
        ],[
            'email.email' => "Email ko đúng định dạng",
            'email.required' => "Vui lòng nhập Email",
            'password.min' => 'Mật khẩu ít nhất 6 kí tự'
        ]);

        $credentials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','mess'=>'Đăng Nhập thành công !!']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','mess'=>'Đăng Nhập không  thành công !!']);
        }

       
    }

     //Hiển thị trang DK Tài khoản
     public function getDangKi(){

        return view('pages.dang-ki');
    }

    function postDangKi(Request $req){
        $validator = \Validator::make($req->all(), [
            'username' => 'required|unique:users|max:50|min:10',
            'email' => 'required|unique:users|email',
            'gender' => "required",
            'password'=>'required|min:6',
            'confirm_password' => 'same:password'
        ],[
            'username.unique' => "Tên đã có người sử dụng",
            'email.email' => "Email ko đúng định dạng",
            'confirm_password.same' => 'Mật khẩu không giống nhau'
        ]);

        if ($validator->fails()) {
            return redirect()->route('dang-ki')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->fullname = $req->hoten;
        $user->birthdate = date('Y-m-d',strtotime($req->birthdate));
        $user->gender = $req->gender;
        $user->address = $req->diachi;
        $user->phone = $req->dienthoai;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('thanhcong','Đăng kí thành công!');
    }


    public function postLogout(){
      Auth::logout();
      return redirect()->route('trang-chu');
    }

    //Hiển thị trang About
    public function getAboutus(){

        return view('pages.about-us');
    }

    //Hiển thị trang Liên hệ
    public function getLienhe(){

        return view('pages.lien-he');
    }

    public function postLienhe(Request $req){
        //dd($req->all());
        $validator = \Validator::make($req->all(), [
            'email' => 'required|unique:users|email',
            'phone' => "required",
            'message' => "required",
            'ten' => "required",

           
        ],[
            'email.email' => "Email không đúng định dạng",
            'email.required'=>"Vui lòng nhập email",
            'phone.required'=>"Vui lòng bạn nhập số điện thoại",
            'message.required'=>"vui lòng bạn nhập Message",
            'ten.required'=>"Vui lòng nhập tên"
        ]);

        if ($validator->fails()) {
            return redirect()->route('lien-he')
                        ->withErrors($validator)
                        ->withInput();
        }
        $contact = new contact;
        $contact->email=$req->email;
        $contact->phone=$req->phone;
        $contact->message=$req->message;
        $contact->ten=$req->hoten;
        $contact->save();
        return \redirect()->route('lien-he')->with('thongbao','Bạn đã gửi Message thành công!');
        

    }

    //tìm kiếm
    function getSearch (Request $req){
        $product=Products::where('name','like','%'.$req->key.'%')
                        ->orWhere('price',$req->key)
                        ->get();
        return view('pages.tim-kiem',\compact('product'));
    }

    //đơn hàng
    function getDonHang(){
        $user = Auth::user()->email;
        $bills = DB::table('bills')
        ->join('customers','bills.id_customer','=','customers.id')
        ->join('bill_detail','bill_detail.id_bill','=','bills.id')
        ->join('products','products.id','bill_detail.id_product')
        ->select('customers.*','bills.*','bill_detail.*','products.name')
        ->where('customers.email','=',$user)
        ->groupBy('bill_detail.id_bill')
        ->get();
        //dd($bills);
        return view('pages.don-hang',\compact('bills','user'));
    }

}
