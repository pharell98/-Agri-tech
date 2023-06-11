@extends('layouts.appAdmin')
@section('title')
    Categorie
@endsection
@section('contenu')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Categories</h6>
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Libelle</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->libelle }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', [$categorie->id]) }}" class="btn btn-primary">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
