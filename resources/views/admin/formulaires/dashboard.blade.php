@extends('layouts.appAdmin')
@section('title')
    Dashboard
@endsection
@section('contenu')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Taux de satisfaction client :</p>
                        <h6 class="mb-0">95 %</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Nombre total de clients: </p>
                        <h6 class="mb-0">1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Nbre. Moy. Produit/jour</p>
                        <h6 class="mb-0">1234 Produits</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">NBR. Total produit vendu</p>
                        <h6 class="mb-0">{{ $totalProduitsVendu }} Produits</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Statistique des ventes/Produit</h6>
                    </div>
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Statistique des ventes/categories</h6>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->

    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Messages</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="back/img/user.jpg" alt=""
                             style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Jhon Doe</h6>
                                <small>15 minutes ago</small>
                            </div>
                            <span>Short message goes here...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Témoignage</h6>
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded-circle mx-auto mb-4" src="back/img/testimonial-1.jpg"
                                 style="width: 100px; height: 100px;">
                            <h5 class="mb-1">Client Name</h5>
                            <p>Profession</p>
                            <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet
                                eirmod eos labore diam</p>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded-circle mx-auto mb-4" src="back/img/testimonial-2.jpg"
                                 style="width: 100px; height: 100px;">
                            <h5 class="mb-1">Client Name</h5>
                            <p>Profession</p>
                            <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet
                                eirmod eos labore diam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Commande</h6>
                @if(Session::has('error'))
                    {{Session::get('error')}}
                @endif
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-white">
                        <th scope="col">#id</th>
                        <th scope="col">Client</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Panier</th>
                        <th scope="col">Adres livraison</th>
                        <th scope="col">Prix livraison</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commandes as $commande)
                        <tr>
                            <td>{{$commande->id}}</td>
                            <td>{{$commande->nom}}</td>
                            <td>{{$commande->adresse}}</td>
                            <td>
                                @foreach($commande->panier->items as $item)
                                    {{$item['libelle_produit'].' , '}}
                                @endforeach

                            </td>
                            <td>{{$commande->lieulivraison}}</td>
                            <td>{{$commande->prixlivraison}}</td>
                            <td>{{$commande->montant}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick=" window.location='{{ route('pdf',[$commande->id]) }} '">
                                    PDF
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $commandes->onEachSide(5)->links() }}
    </div>
    <!-- Recent Sales End -->
@endsection
