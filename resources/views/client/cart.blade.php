@extends('layouts.appClient')
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url('/front/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-cart">
        @if(Session::has('panier'))
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Libelle Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                                <tbody>
                                @foreach($produits as $produit)
                                    <tr class="text-center">
                                        <td class="product-remove"><a href="{{ route('paniers.show', $produit['id']) }}"><span class="ion-ios-close"></span></a></td>

                                        <td class="image-prod">
                                            <div class="img"
                                                 style="background-image:url('/storage/produits_image/{{$produit['image']}}');"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{$produit['libelle_produit']}}</h3>
                                        </td>

                                        <td class="price">CFA: {{$produit['prix']}}</td>
                                        <form method="post" action="{{ route('paniers.update', $produit['id']) }}" >
                                            @method('PUT')
                                            @csrf
                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <input type="number" name="quantity"
                                                           class="quantity form-control input-number"
                                                           value="{{$produit['qty']}}" min="1">
                                                </div>
                                                <input type="submit" value="Modifier" class="btn btn-success">
                                            </td>
                                        </form>
                                        <td class="total">CFA: {{$produit['prix'] * $produit['qty']}}</td>
                                    </tr><!-- END TR-->
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-lg-12 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Activer service de livraison</h3>
                        <p>Faites-vous livrer par nos meilleurs livreurs</p>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="active" value="" class="mr-2"> Activer livraison</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-8 mt-5 cart-wrap ftco-animate" id="shipping-info" style="display: none;">
                    <div class="cart-total mb-3">
                        <h3>Estimation des frais de transports</h3>
                        <p>Entrez votre destination pour obtenir une estimation de l'expédition</p>
                        <div id="map" style="height: 400px; "></div>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimation</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Totaux du panier</h3>
                        <p class="d-flex">
                            <span>Total Achat</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Livraison</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Rabais</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>TOTAL</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Passer à la caisse</a></p>
                </div>
            </div>
        </div>
        @else
            <h1 class="mb-0 bread bnt btn-info text-center">Votre panier est vide</h1>
        @endif
    </section>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        /*
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
**/
            const checkbox = document.getElementById('active');
            const shippingInfo = document.getElementById('shipping-info');

            checkbox.addEventListener('change', function() {
            if (this.checked) {
            shippingInfo.style.display = 'block';  // Afficher le code de livraison
        } else {
            shippingInfo.style.display = 'none';   // Masquer le code de livraison
        }
        });



            ///carte
        var map = L.map('map').setView([14.7167, -17.4677], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

    </script>
@endsection


