@extends('layouts.app')

@section('content')

    @include('layouts.partials.dash-menu')
    
    <div class="container mt-5" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifica utente: {{ $users->name }}</h1>
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

                <form action="{{route('admin.user.update', ['user' => $users->id])}}" method="post"
                      enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validation-tooltip-01">Nome</label>
                            <input type="text" class="form-control" id="validation-tooltip-01" name="name"
                                   value="{{ old('name', $users->name) }}" required placeholder="Name"
                                   maxlength="50"
                                   minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('name')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validation-tooltip-1">Email</label>
                            <input type="text" class="form-control" id="validation-tooltip-11"
                                   value="{{ old('email', $users->email) }}" name="email" placeholder="Email"
                                   maxlength="50"
                                   minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('email')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validation-tooltip-12">Password</label>
                            <input type="password" class="form-control" id="validation-tooltip-12" name="password"
                                   required placeholder="Password" maxlength="64" minlength="1">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('password')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validation-tooltip-13">Conferma Password</label>
                            <input type="password" class="form-control" id="validation-tooltip-13"
                                   name="password_confirmation" required placeholder="Confirm password" maxlength="64"
                                   minlength="1">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('password')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Salva modifiche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
