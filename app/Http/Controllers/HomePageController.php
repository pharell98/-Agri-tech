<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function home()
    {
        $sliders = Slider::where('status',1)->get();
        $produits = Produit::where('status',1)->get();
        return view('client.home',['sliders'=>$sliders,'produits'=>$produits]);
    }

}
