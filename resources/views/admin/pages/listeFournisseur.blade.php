@extends('layouts.appAdmin')
@section('title')
    Fournisseur
@endsection
@section('contenu')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-7">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Fournisseurs</h6>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Libelle</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>1</td>
                                <td>Fruit</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
