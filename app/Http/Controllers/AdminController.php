<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $commandes = Commande::simplePaginate(5);
        $totalProduitsVendu = 0;

        $commandes->transform(function ($commande, $key) {
            $commande->panier = unserialize($commande->panier);
            return $commande;
        });
        foreach ($commandes as $order) {
            foreach ($order->panier->items as $item) {
                $totalProduitsVendu = $totalProduitsVendu + $item['qty'];
            }
        }

        return view('admin.formulaires.dashboard', ['commandes' => $commandes,'totalProduitsVendu' => $totalProduitsVendu]);
    }


}
