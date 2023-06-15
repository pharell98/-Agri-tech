<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index(){
        if(!Session::has('panier')){
            return view('client.cart');
        }

        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['produits' => $cart->items]);
    }
    public function show($id){
        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('panier', $cart);
        }
        else{
            Session::forget('panier');
        }

        //dd(Session::get('cart'));
        return redirect('/paniers');
    }

    public  function update(Request $request, $id){
           //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('panier')? Session::get('panier'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('panier', $cart);

        //dd(Session::get('cart'));
        return redirect('paniers');
    }


}
