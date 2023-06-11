@extends('layouts.appAdmin')
@section('title')
    Fournisseur
@endsection
@section('contenu')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter fournisseur</h6>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputNom" class="form-label">Nom Complet</label>
                            <input type="text" class="form-control" id="exampleInputNom"
                                   aria-describedby="NomHelp">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                              id="floatingTextarea" style="height: 70px;"></textarea>
                            <label for="floatingTextarea">Adresse</label>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="exampleInputTel" class="form-label">Téléphone</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+221</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
