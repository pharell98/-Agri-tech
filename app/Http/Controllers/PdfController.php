<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function pdf($id)
    {

        Session::put('id', $id);
        try {
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        } catch (\Exception $e) {
            return redirect('/admin')->with('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html()
    {

        $orders = Commande::where('id', Session::get('id'))->get();

        foreach ($orders as $order) {
            $name = $order->nom;
            $address = $order->adresse;
            $date = $order->created_at;
            $lieuLiv =$order->lieulivraison;
            $prixLiv =$order->prixlivraison;
            $total = $order->montant;
        }

        $orders->transform(function ($order, $key) {
            $order->panier = unserialize($order->panier);

            return $order;
        });

        $output = '<link rel="stylesheet" href="front/css/style.css">
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                    <th>
                                    Client Name : ' . $name . '<br> Client Address : ' . $address . ' <br> Date : ' . $date . '

                                    <br> Lieu livaison : ' . $lieuLiv . ' <br> Prix livaison : ' . $prixLiv . '

                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';

        foreach ($orders as $order) {
            foreach ($order->panier->items as $item) {

                $output .= '<tr class="text-center">
                                <td class="image-prod"><img src="storage/produits_image/' . $item['image'] . '" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name">
                                    <h3>' . $item['libelle_produit'] . '</h3>
                                </td>
                                <td class="price">CFA ' . $item['prix'] . '</td>
                                <td class="qty">' . $item['qty'] . '</td>
                                <td class="total">CFA ' . $item['prix'] * $item['qty'] . '</td>
                            </tr><!-- END TR-->
                            </tbody>';

            }

        }

        $output .= '</table>';

        $output .= '<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th>XOF : ' . $total . '</th>
                            </tr>
                        </thead>
                    </table>';

        return $output;

    }

}
