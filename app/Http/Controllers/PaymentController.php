<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    public function getCheckout(){
        if (!Session::has('cart')){
//            return response('Your shopping cart is empty', Response::HTTP_NO_CONTENT);
            return 'i got to the first return';
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $qty = $cart->totalQty;

//        return response(['total' => $total], Response::HTTP_CONTINUE);
        //   return 'i got to the last return';
        return view('welcome', compact('total', 'qty'));
    }

//    public function checkout(Request $request){
//        if (!Session::has('cart'))
//            return 'im redirecting back to the shopping page';
//        $oldcart = Session::get('cart');
//        $cart = new Cart($oldcart);
//
//    }



}
