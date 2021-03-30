@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

       <section id="card-single-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/' . $sweets->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-capitalize">Nome: {{$sweets->name}}</h3>
                            <p class="card-text mb-3">Descrizione:{{$sweets->description}}</p>
                            <p class="card-text mb-3">Ingredienti: {{$sweets->ingredients}}</p>
                            <p class="card-text mb-3">Prezzo: {{$sweets->price}}</p>
                            <a href="{{route('admin.sweets.edit', ['sweet' => $sweets->slug])}}"
                               class="btn btn-primary">Modifica</a>
                            <form method="POST" class="d-inline-block"
                                  action="{{route('admin.sweets.destroy', ['sweet' => $sweets->id])}}">
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
@endsection
