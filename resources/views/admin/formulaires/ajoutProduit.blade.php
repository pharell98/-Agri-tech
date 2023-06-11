@extends('layouts.appAdmin')
@section('title')
    Produit
@endsection
@section('contenu')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-8">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="container tm-mt-big tm-mb-big">
                        <div class="row">
                            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="tm-block-title d-inline-block">Ajouter des
                                                produits</h2>
                                        </div>
                                    </div>
                                    <div class="row tm-edit-product-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <form method="post" action="{{ route('produits.store') }}" class="tm-edit-product-form" enctype="multipart/form-data">
                                                @csrf
                                               <div class="form-group mb-3">
                                                    <label for="name">Nom Produit</label>
                                                    <input id="name" name="libelle_produit" value="{{ old('libelle_produit') }}"  type="text"
                                                           class="form-control validate" />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="category">Categorie</label>
                                                    <select class="custom-select tm-select-accounts" name="categorie" id="category">
                                                        <option selected disabled>Chosir catégorie</option>
                                                        @foreach($categories as $id => $libelle)
                                                            <option value="{{ $id }}" {{ old('categorie') == $id ? 'selected' : '' }}>{{ $libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                        <label for="prix">Prix Unit.</label>
                                                        <input id="prix" name="prix" value="{{ old('prix') }}"  type="text"
                                                               class="form-control validate" />
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                            <div class="custom-file mt-3 mb-3">
                                                <img id="productImage" src="/back/img/NoImage.jpg" alt="Product Image"
                                                     class="img-fluid"/>
                                                <br><br>
                                                <input id="fileInput" name="image" type="file" style="display:none;"
                                                       onchange="previewImage(event)"/>
                                                <input type="button" class="btn btn-primary btn-block mx-auto"
                                                       value="Télécharger une image"
                                                       onclick="document.getElementById('fileInput').click();"/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                                Valider
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            <!-- Parcours les erreurs et affiches -->
                            @foreach ($errors->all() as $error)
                                <li class="text text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </div>
    </div>
    </div>
    <!-- Form End -->
    <script>
        function previewImage(event) {
            var input = event.target;
            var imageElement = document.getElementById('productImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imageElement.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                imageElement.src = "chemin/vers/limage-par-defaut.jpg";
            }
        }
    </script>
@endsection

