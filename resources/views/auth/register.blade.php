@extends('layouts.app')

@section('content')
    @include('inc.jumbotron')

    <!--FormularzRejestracji-->
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="firstName">Imię</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="Wpisz imię">
                        @if ($errors->has('firstName'))
                            <small class="form-text text-danger">{{ $errors->first('firstName') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nazwisko</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Wpisz nazwisko">
                        @if ($errors->has('lastName'))
                            <small class="form-text text-danger">{{ $errors->first('lastName') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Wpisz email">
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
                    <div class="form-group">
                        <label for="password-confirm">Powtorz hasło</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Wpisz hasło ponownie">
                        @if ($errors->has('password_confirmation'))
                            <small class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="country">Wybierz kraj pochodzenia</label>
                        <select name="country" id="country" class="form-control">
                            <option>Polska</option>
                            <option>Ukraina</option>
                            <option>Niemcy</option>
                            <option>Rosja</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="accept" type="checkbox" value="1">
                            Akceptuję regulamin konkursu.
                        </label>
                    </div>
                    @if ($errors->has('accept'))
                        <small class="form-text text-danger">{{ $errors->first('accept') }}</small>
                    @endif
                    <button type="submit" class="btn btn-outline-primary">Rejestruj</button>
                </form>
            </div>
        </div>
        <!--.FormularzRejestracji-->
    </div>
@endsection
