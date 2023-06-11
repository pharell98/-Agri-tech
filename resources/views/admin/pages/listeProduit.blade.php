@extends('layouts.appAdmin')
@section('title')
    Produit
@endsection
@section('contenu')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary  h-100 p-4">
                    <h6 class="mb-4">Produits</h6>
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Libelle</th>
                                <th scope="col">Prix Unit.</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">fournisseur</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produits as $produit)
                            <tr>
                                <th scope="row">{{ $produit->id }}</th>
                                <th scope="col"><img src="/storage/produits_image/{{ $produit->image }}" alt="" width="70px"></th>
                                <th scope="col">{{ $produit->libelle_produit }}</th>
                                <th scope="col">{{ $produit->prix }}</th>
                                <th scope="col">{{ $produit->categorie->libelle }}</th>
                                <th scope="col">Bailo sow</th>
                                <th scope="col">
                                    @if ($produit->status == 1)
                                        <label class="btn btn-info">En vente...</label>
                                    @else
                                        <label class="btn btn-warning">En attente...</label>
                                    @endif
                                </th>
                                <th scope="col">
                                    <button class="btn btn-outline-warning"
                                            onclick=" window.location='{{ route('produits.edit',[$produit->id]) }}'">Modifier</button>
                                    <a href="{{ route('produits.destroy',[$produit->id]) }}'" id="delete" class="btn btn-outline-danger">Suprimer</a>
                                    @if ($produit->status == 1)
                                    <button class="btn btn-outline-warning"
                                            onclick=" window.location='{{ route('produits.desactiver',[$produit->id]) }}'">Retirer du vente
                                    </button>
                                    @else
                                        <button class="btn btn-outline-success"
                                                onclick=" window.location='{{ route('produits.activer',[$produit->id]) }}'">Valider Commande
                                        </button>
                                    @endif
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $produits->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table End -->
@endsection

