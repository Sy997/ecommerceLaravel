<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//hien thi trang chu 
Route::get('index','Pagecontroller@getIndex')->name('trang-chu');
//HIển thị các trang khác
Route::get('loai-sp/{id}','Pagecontroller@getLoaiSP')->name('loai-sp');

Route::get('chi-tiet-sp/{id}','Pagecontroller@getChitietSP')->name('chi-tiet-sp');


Route::get ('gio-hang','PageController@getGiohang')->name('gio-hang');
Route::get('addcart/{id}','PageController@getAddCart')->name('themgiohang');
Route::get('del-cart/{id}','PageController@getDelItem')->name('xoagiohang');
Route::get('update-cart/{id}/{qty}','PageController@UpdateQtyItem')->name('capnhatgiohang');
Route::get('update','PageController@getUpdateCart')->name('updatecart');

//route ssearch
Route::get('tim-kiem','PageController@getSearch')->name('getsearch');



//route dat hang
Route::get ('dat-hang','Pagecontroller@getDathang')->name('dat-hang');
Route::post('dat-hang','Pagecontroller@postDathang')->name('dat-hang');
// route dăng kí thành viên
Route::get ('tai-khoan','Pagecontroller@getTaikhoan')->name('tai-khoan');
Route::post ('tai-khoan','Pagecontroller@postTaikhoan')->name('post-tai-khoan');
Route::get ('dang-ki','Pagecontroller@getDangKi')->name('dang-ki');
Route::post('dang-ki','Pagecontroller@postDangKi')->name('post-dang-ki');
Route::get('dang-xuat','Pagecontroller@postLogout')->name('post-dang-xuat');
//route about-ú
Route::get ('about-us','Pagecontroller@getAboutus')->name('about-us');
//route liên hệ 
Route::get ('lien-he','Pagecontroller@getLienhe')->name('lien-he');
Route::post ('lien-he','Pagecontroller@postLienhe')->name('post-contact');

//route mail
Route::get ('mail','Pagecontroller@getSendMail')->name('send-mail');

//route đơn hàng
Route::get ('don-hang','Pagecontroller@getDonHang')->name('don-hang');


// phan admin
Route::get('login',"AdminController@getLogin")->name('getlogin');
Route::post('admin-login',"AdminController@postLogin")->name('post-login');

Route::get('register',"AdminController@getRegister")->name('get-register');
Route::post('register',"AdminController@postRegister")->name('register');

Route::get('home',"AdminController@getHome")->name('home-admin');
//Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'],function(){

    //admin/logout
    // Route::get('logout',"AdminController@getLogout")->name('logout');

    // // admin
    // //Route::get('/home',"AdminController@getHome")->name('home-admin');

    // //admin/update-bill-2
    // Route::get('update-bill-{id}',"AdminController@getUpdateBill");

    // Route::get('update-bills/{id}',"AdminController@getupdateBills");

    // //admin/bills-0
    // Route::get('bills-{status?}',"AdminController@getBillsByStatus")->name('bills');


    // // admin/add-product
    // Route::get('add-product',"AdminController@getAddProduct")->name('addProduct');

    // Route::get('list-product-{idtype}',"AdminController@getListProduct")->name('listProduct');

    // Route::get('delete-product-{id}',"AdminController@getDeleteProduct")->name('deleteProduct');

    // Route::group(['middleware'=>'isAdmin'],function(){
    //     Route::get('update-product-{id}',"AdminController@getUpdateProduct")->name('updateProduct');

    //     Route::post('update-product-{id}',"AdminController@postUpdateProduct")->name('updateProduct');
    // });

    // Route::get('add-product',"AdminController@getAddProduct")->name('addProduct');
    // Route::post('add-product',"AdminController@postAddProduct")->name('addProduct');

    // //admin/select-level-two
    // Route::get('select-level-two',"AdminController@getLevelTwo")->name('getl2');

    // //admin/slide
    // Route::get('slide',"AdminController@getSlide")->name('getslide');
    // Route::get('delete-slide-{id}',"AdminController@getDeleteSlide")->name('deleteSlide');
    // Route::get('adds-lide',"AdminController@getAddSlide")->name('addSlide');
    // Route::post('add-slide',"AdminController@postAddSlide")->name('postSlide');
    // Route::get('update-slide/{id}',"AdminController@getupdateSlide")->name('updateSlide');
    // Route::post('update-slide/{id}',"AdminController@postupdateSlide")->name('postupdateSlide');
    // Route::get('delete-slide/{id}',"AdminController@getxoaSlide")->name('deleteSlide');

    // //admin/user
    // Route::get('user',"AdminController@getUser")->name('getuser');
    // Route::get('delete-user-{id}',"AdminController@getDeleteUser")->name('deleteUser');
    // Route::get('add-user',"AdminController@getAddUser")->name('addUser');
    // Route::post('add-user',"AdminController@postAddUser")->name('postUser');
    // Route::get('edit-user/{id}',"AdminController@geteditUser")->name('editUser');
    // Route::post('edit-user/{id}',"AdminController@posteditUser")->name('posteditUser');
    // Route::get('delete-user/{id}',"AdminController@getdeleteUser")->name('deleteUser');

    // //admin/contact
    // Route::get('contact',"AdminController@getContact")->name('getcontact');
//});
    Route::get('logout',"AdminController@getLogout")->name('logout');

    // admin
    //Route::get('/home',"AdminController@getHome")->name('home-admin');

    //admin/update-bill-2
    Route::get('update-bill-{id}',"AdminController@getUpdateBill");

    Route::get('update-bills/{id}',"AdminController@getupdateBills");

    //admin/bills-0
    Route::get('bills-{status?}',"AdminController@getBillsByStatus")->name('bills');


    // admin/add-product
    Route::get('add-product',"AdminController@getAddProduct")->name('addProduct');

    Route::get('list-product-{idtype}',"AdminController@getListProduct")->name('listProduct');

    Route::get('delete-product-{id}',"AdminController@getDeleteProduct")->name('deleteProduct');

    Route::group(['middleware'=>'isAdmin'],function(){
        Route::get('update-product-{id}',"AdminController@getUpdateProduct")->name('updateProduct');

        Route::post('update-product-{id}',"AdminController@postUpdateProduct")->name('updateProduct');
    });

    Route::get('add-product',"AdminController@getAddProduct")->name('addProduct');
    Route::post('add-product',"AdminController@postAddProduct")->name('addProduct');

    //admin/select-level-two
    Route::get('select-level-two',"AdminController@getLevelTwo")->name('getl2');

    //admin/slide
Route::get('slide',"AdminController@getSlide")->name('getslide');
Route::get('delete-slide-{id}',"AdminController@getDeleteSlide")->name('deleteSlide');
Route::get('adds-lide',"AdminController@getAddSlide")->name('addSlide');
Route::post('add-slide',"AdminController@postAddSlide")->name('postSlide');
Route::get('update-slide/{id}',"AdminController@getupdateSlide")->name('updateSlide');
Route::post('update-slide/{id}',"AdminController@postupdateSlide")->name('postupdateSlide');
Route::get('delete-slide/{id}',"AdminController@getxoaSlide")->name('deleteSlide');

    //admin/user
Route::get('user',"AdminController@getUser")->name('getuser');
Route::get('delete-user-{id}',"AdminController@getDeleteUser")->name('deleteUser');
Route::get('add-user',"AdminController@getAddUser")->name('addUser');
Route::post('add-user',"AdminController@postAddUser")->name('postUser');
Route::get('edit-user/{id}',"AdminController@geteditUser")->name('editUser');
Route::post('edit-user/{id}',"AdminController@posteditUser")->name('posteditUser');
Route::get('delete-user/{id}',"AdminController@getdeleteUser")->name('deleteUser');

    //admin/contact
Route::get('contact',"AdminController@getContact")->name('getcontact');