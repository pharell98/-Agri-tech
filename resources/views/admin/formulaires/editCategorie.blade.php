@extends('layouts.appAdmin')
@section('title')
    Modifier
@endsection
@section('contenu')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Modifier Categorie</h6>
                    <div class="form-group">
                        @error('libelle')
                        <div class="btn btn-warning">
                            <i class="text text-danger">{{ $message }}</i>
                        </div>
                        @enderror
                    </div>
                    <form method="post" action="{{ route('categories.update', $categorie->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">libelle</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="libelle" value="{{$categorie->libelle}}" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection


