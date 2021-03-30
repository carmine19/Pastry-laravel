@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    <section id="card-single-item">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="box-title text-center">
                                <h1>Azienda: <span class="text-capitalize">{{$pastry->name}}</span></h1>
                            </div>
                            <div class="box-content">
                                <div class="list-group">
                                    <p href="#" class="list-group-item active">
                                        <strong>Nome:</strong> {{$pastry->name}}</p>
                                    <p href="#" class="list-group-item">
                                        <strong>Indirizzo:</strong> {{$pastry->address}}</p>
                                    <p href="#" class="list-group-item">
                                        <strong>Telefono:</strong> {{$pastry->phone}}</p>
                                    <p href="#" class="list-group-item">
                                        <strong>Email:</strong> {{$pastry->email}}</p>
                                </div>
                                <div class="box-btn mt-3">
                                    <a href="{{route('admin.pastry.edit', ['pastry' => $pastry->slug])}}"
                                       class="btn btn-warning">Modifica</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
