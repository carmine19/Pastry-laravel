@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    <div class="container" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifica piatto</h1>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{route('admin.sweets.update', ['sweet' => $sweets->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Inserisci il titolo" value="{{old('name', $sweets->name) }}" required>
                    </div>

                    <div class="form-group">
                        @if ($sweets->cover)
                            <img src="{{ asset('storage/' . $sweets->cover) }}" alt="{{$sweets->name}}">
                        @endif
                        <input type="file" class="form-control-file" name="cover">
                    </div>


                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea name="description" class="form-control"
                                  rows="10" placeholder="Inizia a scrivere qualcosa..."
                                  required>{{ old('content' , $sweets->description) }}</textarea>
                    </div>


                    <div class="form-group mb-5 mt-5">
                        <label>Ingredienti</label>
                        <input type="text" name="ingredients" value="{{old('ingredients', $sweets->ingredients)}}"
                               maxlength="50" minlength="1" autocomplete="on"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>visibilità</label>
                        <select class="form-control" name="visibility">
                            <option
                                value="1" {{ $sweets->visibility == true ? 'selected=selected' : '' }}>
                                visibile
                            </option>
                            <option
                                value="0" {{ $sweets->visibility == false ? 'selected=selected' : '' }} >
                                non visibile
                            </option>
                        </select>
                    </div>


                    <div class="form-group mb-5 mt-5">
                        <label>Prezzo</label>
                        <input type="text" name="price" value="{{old('price', $sweets->price)}}"
                               class="form-control" maxlength="6" minlength="1">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-activity">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            Modifica piatto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
