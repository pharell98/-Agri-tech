<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\cart;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $produits = Produit::where('status',1)->get();
        $categories = Categorie::get();
        return view('client.shop',['produits'=>$produits,'categories'=>$categories]);
    }

    public function show($id){
        $produits= Produit::where('categorie_id', $id)->where('status',1)->get();
        $categories = Categorie::get();
        return view('client.shop',['produits'=>$produits,'categories'=>$categories]);
    }

    public function addPanier($id){
        $produit = Produit::find($id);

        $oldCart = Session::has('panier')? Session::get('panier') : Null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('panier', $cart);

       // dd(Session::get('panier'));
        return redirect('shops');
    }



}

