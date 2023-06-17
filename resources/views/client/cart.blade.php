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
                        <p>Destination : <i class="text-info"  id="adresse_arrivee">{{ old('adresse_arrivee') }}</i></p>
                        <div id="map" style="width: 700px; height: 550px;"></div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Totaux du panier</h3>
                        <p class="d-flex">
                            <span>Total Achat</span>
                            <span id="total-achat">{{ intval(Session::get('panier')->totalPrice) }}</span>
                        </p>

                        <p class="d-flex">
                            <span>Livraison</span>
                            <span id="prix">{{ Session::has('prix') ? old('prix') : 0 }}</span>

                        </p>
                        <p class="d-flex">
                            <span>Rabais</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>TOTAL</span>
                                <span id="total-prix">{{ Session::has('total-prix') ? old('total-prix') : intval(Session::get('panier')->totalPrice) }}</span>
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
        var map = L.map('map').setView([14.7167, -17.4677], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);
        // Créer une icône personnalisée en vert
        var greenIcon = L.icon({
            iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            tooltipAnchor: [16, -28],
            shadowSize: [41, 41]
        });
        var markerDepart = L.marker([14.692202275702636, -17.452591757354696], { draggable: true }).addTo(map);
        var markerArrivee = L.marker([0, 0], { draggable: true }).addTo(map);

        // Ajouter un événement de dragend pour les marqueurs de départ et d'arrivée
        markerDepart.setIcon(greenIcon);
        markerArrivee.setIcon(greenIcon);

        // Ajouter un événement de clic à la carte pour sélectionner l'adresse d'arrivée
        map.on('contextmenu', function(e) {
            // Récupérer la latitude et la longitude du clic
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            var url = "https://us1.locationiq.com/v1/reverse?key=pk.771956bda85a36f299d7d6d5acb881ac&lat=" + lat + "&lon=" + lng + "&format=json";

            // Définir la position du marqueur d'arrivée et mettre à jour le formulaire
            markerArrivee.setLatLng(e.latlng);
            $("#a_lat").val(lat);
            $("#a_long").val(lng);

            var settings_arrivee = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET"
            }

            $.ajax(settings_arrivee).done(function (response) {
                console.log(response);
                const addressParts = response.display_name.split(",");
                let result = "";

                if (addressParts.length > 2) {
                    for (let i = 0; i < 2; i++) {
                        result += addressParts[i] + ",";
                    }
                }

                result = result.slice(0, -1); // retire la virgule finale

                $("#adresse_arrivee").text(result);
            });

            // Appeler la requête AJAX pour Distance Matrix API et afficher le résultat dans la console
            var d_lat = 14.692202275702636;
            var d_lng =-17.452591757354696;
            var url2 = "https://us1.locationiq.com/v1/directions/driving/"+d_lng+","+d_lat+";"+lng+","+lat+"?key=pk.771956bda85a36f299d7d6d5acb881ac&steps=true&alternatives=true&geometries=polyline&overview=full"
            var settings_d_d = {
                "async": true,
                "crossDomain": true,
                "url": url2,
                "method": "GET"
            }
            console.log(d_lat);

            $.ajax(settings_d_d).done(function(response) {
                console.log(response);
                var totalAchat = document.getElementById('total-achat');
                var prixAchats = parseInt(totalAchat.textContent);
                var distance = response.routes[0].distance / 1000
                var duree = response.routes[0].duration /40
                var prix = ((distance * 2 + duree * 0.1)*200).toFixed(0);
                var price = adjustPrice(prix);
                var totalPrix = prixAchats + price

                $("#dure").val(duree.toFixed(0));
                $("#distance").val(distance.toFixed(1));
                $("#prix").text(parseInt(price));
                $("#total-prix").text(parseInt(totalPrix));
                console.log(prixAchats);
            });

            function adjustPrice(price) {
                if (price < 500) {
                    return 500;
                } else if (price < 1900) {
                    return Math.round(price/100)*100;
                } else if (price < 2000) {
                    return 1900;
                } else {
                    return Math.round(price/1000)*1000;
                }
            }
        });

            const checkbox = document.getElementById('active');
            const shippingInfo = document.getElementById('shipping-info');

            checkbox.addEventListener('change', function() {
            if (this.checked) {
            shippingInfo.style.display = 'block';  // Afficher le code de livraison
        } else {
            shippingInfo.style.display = 'none';   // Masquer le code de livraison
        }
        });


    </script>
@endsection


