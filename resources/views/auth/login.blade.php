@extends('layouts.app')

@section('content')
    @include('inc.jumbotron')
    <!--FormularzRejestracji-->
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('firstName') }}" placeholder="Wpisz email">
                        @if ($errors->has('email'))
                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Wpisz hasło">
                        @if ($errors->has('password'))
                            <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Zaloguj</button>
                </form>
            </div>
        </div>
        <!--.FormularzRejestracji-->
    </div>
@endsection
