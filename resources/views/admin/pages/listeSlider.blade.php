@extends('layouts.appAdmin')
@section('title')
    Sliders
@endsection
@section('contenu')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary  h-100 p-4">
                    <h6 class="mb-4">Slider</h6>
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
                                <th scope="col">titre 1</th>
                                <th scope="col">Titre 2</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <th scope="col"><img src="/storage/sliders_image/{{ $slider->image }}" alt="" width="70px"></th>
                                    <th scope="col">{{ $slider->description_1 }}</th>
                                    <th scope="col">{{ $slider->description_2 }}</th>
                                    <th scope="col">
                                        @if ($slider->status == 1)
                                            <label class="btn btn-info">En vente...</label>
                                        @else
                                            <label class="btn btn-warning">En attente...</label>
                                        @endif
                                    </th>
                                    <th scope="col">
                                        <button class="btn btn-outline-warning"
                                                onclick=" window.location='{{ route('sliders.edit',[$slider->id]) }}'">Modifier</button>
                                        <a href="{{ route('sliders.destroy',[$slider->id]) }}'" id="delete" class="btn btn-outline-danger">Suprimer</a>
                                        @if ($slider->status == 1)
                                            <button class="btn btn-outline-warning"
                                                    onclick=" window.location='{{ route('sliders.desactiver',[$slider->id]) }}'">Retirer du vente
                                            </button>
                                        @else
                                            <button class="btn btn-outline-success"
                                                    onclick=" window.location='{{ route('sliders.activer',[$slider->id]) }}'">Valider Commande
                                            </button>
                                        @endif
                                    </th>
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
