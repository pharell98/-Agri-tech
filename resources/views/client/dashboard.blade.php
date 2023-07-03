@extends('layouts.appClient')
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url('/front/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Dashboard</a></span>
                        <span> Client</span></p>
                    <h1 class="mb-0 bread">Client</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contenu1')

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/css/style.css') }}">
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                @include('include.dashboardClient')
                <div class="col-lg-9">
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-1">
                                    <div class="dashboard-widget-info">
                                        <span>Nbre. de commandes</span>
                                        <h1>{{$nombre_commandes}} </h1>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fa-solid fa-list"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-2">
                                    <div class="dashboard-widget-info">
                                        <span>Total dépenser </span>
                                        <h1>Cfa: {{$somme_montants}}</h1>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($commandes->isEmpty())
                            <h1 class="mb-0 bread bnt btn-info text-center">Votre panier est vide</h1>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-profile-card">
                                        <h4 class="user-profile-card-title">Historique des Commandes</h4>
                                        <div class="table-responsive">
                                            <table class="table-bordered table-hover">
                                                <tr>
                                                    <th>Contenue Panier</th>
                                                    <th>Date Commande</th>
                                                    <th>Livraison</th>
                                                    <th>Montant Total</th>
                                                    <th>Evaluer Commande</th>
                                                </tr>
                                                <tbody>

                                                @foreach($commandes as $commande)
                                                    <tr>
                                                        <td>
                                                            @foreach($commande->panier->items as $item)
                                                                {{$item['libelle_produit'].' '.$item['qty'].' , '}}
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{$commande->created_at}}
                                                        </td>
                                                        <td>
                                                            @if (strlen($commande->lieulivraison) > 20)
                                                                <span title="{{$commande->lieulivraison}}"
                                                                      data-toggle="tooltip">
                                                        lieu : {{substr($commande->lieulivraison, 0, 15) . "..."}}
                                                     </span>
                                                                <br>
                                                            @else
                                                                lieu : {{$commande->lieulivraison}} <br>
                                                            @endif
                                                            Prix : {{$commande->prixlivraison}}
                                                        </td>
                                                        <td>{{$commande->montant}}</td>
                                                        <td>
                                                            @if($commande->is_evaluated)
                                                                <button class="btn btn-success" disabled>Deja Évalué </button>
                                                            @else
                                                                <button class="btn btn-warning" data-toggle="modal"
                                                                        data-target="#evaluer-modal{{$commande->id}}">
                                                                    Évaluer
                                                                </button>
                                                            @endif
                                                            <div class="modal fade" id="evaluer-modal{{$commande->id}}"
                                                                 tabindex="-1"
                                                                 role="dialog"
                                                                 aria-labelledby="evaluer-modal-label"
                                                                 aria-hidden="true">

                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header btn btn-info">
                                                                            <h5 class="modal-title"
                                                                                id="evaluer-modal-label">
                                                                                Donnez votre avis</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Fermer">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form id="evaluer-form"
                                                                              action="{{route('client.store')}}"
                                                                              method="post">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="rating">Notez votre
                                                                                        expérience
                                                                                        avec nos produits & service
                                                                                        :</label>
                                                                                    <div class="rating mt-2 mb-2">
                                                                                <span class="emoji"
                                                                                      data-rating="1">😞</span>
                                                                                        <span class="emoji"
                                                                                              data-rating="2">😐</span>
                                                                                        <span class="emoji"
                                                                                              data-rating="3">😊</span>
                                                                                        <span class="emoji"
                                                                                              data-rating="4">😃</span>
                                                                                        <span class="emoji"
                                                                                              data-rating="5">😍</span>
                                                                                        <input type="hidden" name="note"
                                                                                               required id="rating"
                                                                                               value="0">
                                                                                    </div>
                                                                                    <input hidden name="commande_id"
                                                                                           value="{{$commande->id}}">
                                                                                    <input hidden name="user_id"
                                                                                           value="{{ Auth::user()->id }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="avis">Commentaire
                                                                                        :</label>
                                                                                    <textarea class="form-control"
                                                                                              name="comment" required
                                                                                              id="avis"
                                                                                              rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary ml-3"
                                                                                        data-dismiss="modal">Annuler
                                                                                </button>
                                                                                <button type="submit" id="evaluer-btn"
                                                                                        class="btn btn-primary">Envoyer
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.emoji').on('click', function () {
                $('.emoji').removeClass('active');
                $(this).addClass('active');
                $('#rating').val($(this).data('rating'));

                //console.log("Emoji cliqué !");
                console.log($('#rating').val());
            });
        });

    </script>

@endsection

