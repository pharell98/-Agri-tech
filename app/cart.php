<?php

namespace App;

class Cart{
   //Tab des items
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    // constructeur par defaut
    public function __construct($oldCart){
    // verifie si on a des items dans ntre panier
        // avant d'ajouter d'autres items
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    // Ajouter
    public function add($item, $product_id){
        // initialise ls infos de notre produit
        $storedItem = ['qty' => 0, 'product_id' => 0, 'libelle_produit' => $item->libelle_produit,
            'prix' => $item->prix, 'image' => $item->image, 'item' =>$item];
            // verifie si le produit n'est pas deja ajouter dans la liste des tems
         if($this->items){
            if(array_key_exists($product_id, $this->items)){
                $storedItem = $this->items[$product_id];
            }
        }
         // recuperer les infos du produit
        $storedItem['qty']++;
        $storedItem['id'] = $product_id;
        $storedItem['libelle_produit'] = $item->libelle_produit;
        $storedItem['prix'] = $item->prix;
        $storedItem['image'] = $item->image;
        $this->totalQty++;
        $this->totalPrice += $item->prix;
        //Ajouter le produit dans items
        $this->items[$product_id] = $storedItem;
    }

    public function updateQty($id, $qty){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['prix'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['prix'] * $qty;

    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['prix'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }


}
?>

