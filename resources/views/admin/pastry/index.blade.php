@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    @if($pastry)
        <section id="dash-restaurant-cards-container" class="p-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4">
                        <div class="card">
                            @if($pastry->cover)
                                <img class="card-img-top" src="{{ asset('storage/' . $pastry->cover) }}"
                                     alt="Card image cap">
                            @else
                                <img class="card-img-top"
                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSppkoKsaYMuIoNLDH7O8ePOacLPG1mKXtEng&usqp=CAU"
                                     alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title text-capitalize">{{$pastry->name}}</h3>
                                <p class="card-text mb-3">{{$pastry->phone}}</p>
                                <p class="card-text mb-3">{{$pastry->email}}</p>
                                <p class="card-text mb-3">{{$pastry->address}}</p>
                                <a href="{{ route('admin.pastry.edit', ['pastry' => $pastry->slug]) }}"
                                   class="btn btn-primaryphp">Modifica</a>
                                <a href="{{ route('admin.pastry.show', ['pastry' => $pastry->slug]) }}"
                                   class="btn btn-warning">Mostra</a>
                                <form method="POST" class="d-inline-block"
                                      action="{{route('admin.pastry.destroy', ['pastry' => $pastry->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @else
        <section id="create-dish">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-create mb-5">
                            <div class="text-left">
                                <a href="{{route('admin.pastry.create')}}" class="btn btn-primary">Crea pasticceria</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection





















