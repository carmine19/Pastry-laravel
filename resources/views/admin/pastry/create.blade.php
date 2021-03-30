@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    <div class="container" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Crea Pasticceria</h1>
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
                <form action="{{route('admin.pastry.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Nome Pasticceria</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Restaurant name" value="{{ old('name') }}" maxlength="50"
                               minlength="1" required autocomplete="on">
                    </div>

                  <div class="form-group">
                        <p>Immagine Pasticceria</p>
                        <img class="w-25" src="{{ asset('images/general/no_cover.png') }}" alt="no cover">
                        <input type="file" class="form-control-file" name="cover">
                    </div>

                    <div class="form-group">
                        <label>Indirizzo</label>
                        <input type="text" name="address" class="form-control"
                               maxlength="50" minlength="1" autocomplete="on"
                               placeholder="Address" value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" name="phone" class="form-control"
                               maxlength="20" minlength="1" autocomplete="on"
                               placeholder="Phone" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="Email" value="{{ old('email') }}" minlength="1">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Salva Ristorante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
