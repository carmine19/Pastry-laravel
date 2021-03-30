@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')
    
    <section id="user-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mt-5">
                    <div class="box-title text-center">
                        <h1>Utente: <span style="color: red"></span>{{$users->name}}</h1>
                    </div>
                    <div class="box-content">
                        <div class="list-group">
                            <p href="#" class="list-group-item active"><strong>Nome
                                    Proprietario:</strong> {{$users->name}}</p>
                            <p href="#" class="list-group-item"><strong>Email:</strong> {{$users->email}}</p>
                        </div>
                        <div class="box-btn mt-3">
                            <a href="{{route('admin.user.edit', ['user' => $users->id])}}" class="btn btn-warning">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
