@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    @if($pastry)
        <section id="create-dish">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-create mb-5">
                            <div class="text-left">
                                <a href="{{route('admin.sweets.create')}}" class="btn btn-primary">Crea piatto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="card-dash-user">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($sweets as $sweet)
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <img src="{{asset('storage/' . $sweet->cover)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-capitalize">{{$sweet->name}}</h3>
                                    <p class="card-text mb-3">{{$sweet->description}}</p>
                                    <a href="{{route('admin.sweets.edit', ['sweet' => $sweet->slug])}}"
                                       class="btn btn-primary">Modifica</a>
                                    <a href="{{route('admin.sweets.show', ['sweet' => $sweet->slug])}}"
                                       class="btn btn-warning">Mostra</a>
                                    <form method="POST" class="d-inline-block"
                                          action="{{route('admin.sweets.destroy', ['sweet' => $sweet->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Devi creare prima un ristorante</h1>
                </div>
            </div>
        </div>
    @endif

@endsection
