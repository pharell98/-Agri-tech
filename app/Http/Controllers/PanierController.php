<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
class PanierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function paiement(Request $request){
        $prixLivraison = $request->input('prix');
        $lieuLivraison = $request->input('lieuLivraison');
        $prixAchat = $request->input('prixAchat');
        $total = $prixLivraison +  $prixAchat;
        Session::put('prixLivraison', $prixLivraison);
        Session::put('lieuLivraison', $lieuLivraison);
        Session::put('total', $total);

        return view('client.checkout',['prixLivraison'=>$prixLivraison,'total'=>$total,'lieuLivraison'=>$lieuLivraison]);
    }

    public function payer(Request $request){
        Stripe::setApiKey('sk_test_51NK32UDJMpV7WgnsYMifkyE3rEMFeAnHBtelw0UTbRnNf8B7LZcjoRT1inTNdihkvhWOzgvxnU9mWKp45reuJdPK00NIkycWo8');
        try{
            $cart = Session::has('total') ? Session::get('total') : null;
            $panier = Session::has('panier')? Session::get('panier'):null;
            $charge = Charge::create(array(
                "amount" => $cart * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $commande = new Commande();
            $commande->nom = $request->input('nom');
            $commande->adresse = $request->input('address');
            $commande->lieulivraison = $request->input('lieulivraison');
            $commande->prixlivraison = intval($request->input('prixlivraison'));
            $commande->panier = serialize($panier);
            $commande->payement_id = $charge->id;
            $commande->montant = intval($cart);
            $commande->users_id = $request->input('idUser');

            $commande->save();

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect()->route('paniers.paiement')->with('error', $e->getMessage());
        }

        Session::forget('panier');
        return redirect('paniers')->with('success', 'Achat reuissi avec succé merci !!!');
    }
}
