@extends('layouts.appClient')
@section('contenu')


    <div class="hero-wrap hero-bread" style="background-image: url('front/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form method="POST" action="{{ route('paniers.payer') }}"  id="checkout-form" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        @if(Session::has('error'))
                            {{Session::get('error')}}
                        @endif
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Nom complet</label>
                                    <input type="text" class="form-control" name="nom" value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="lieulivraison" value="{{ Session::has('lieuLivraison') ? Session::get('lieuLivraison') : "null"}}">
                                    <input type="hidden" name="prixlivraison" value="{{ Session::has('prixLivraison') ? Session::get('prixLivraison') : 0}}">
                                    <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Addresse</label>
                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->adresse }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Nom de la carte</label>
                                    <input type="text" class="form-control"  id="card-name" name="name_card" placeholder="">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Numero</label>
                                    <input type="text" class="form-control" id="card-number" placeholder="">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Expiration Month</label>
                                    <input type="text" class="form-control" id="card-expiry-month" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Expiration Year</label>
                                    <input type="text" class="form-control" id="card-expiry-year" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">CVC</label>
                                    <input type="text" class="form-control" id="card-cvc" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <p><input type="submit" class="btn btn-primary py-3 px-4" value="Payer"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Infos reçu</h3>
                                <p class="d-flex">
                                    <span>Total Achat</span>
                                    <span>{{ Session::get('panier')->totalPrice }}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Prix livraison</span>
                                    <span>{{ Session::has('prixLivraison') ? Session::get('prixLivraison') : 0}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Lieu livraison</span>
                                    <span>{{ Session::has('lieuLivraison') ? Session::get('lieuLivraison') : ""}}</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>TOTAL</span>
                                    <span>{{ Session::get('total') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection


<!-- loader -->
@section('script')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="{{asset('src/js/paiement.js')}}"></script>
    <script>
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection
