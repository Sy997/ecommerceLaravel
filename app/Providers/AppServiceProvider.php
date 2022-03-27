<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categories;
use View;
use Session;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $menu = Categories::with('levelTwo')
            ->where('id_parent',null)
            ->get();
        View::share('menu',$menu);

 
        view()->composer('*',function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart= new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'productCart'=>$cart->items,'totalQty'=>$cart->totalQty,'totalPrice'=>$cart->totalPrice,'promtPrice'=>$cart->promtPrice]);
            }
           
        });

    }
    
}
