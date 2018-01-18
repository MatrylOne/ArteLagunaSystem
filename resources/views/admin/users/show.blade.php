@extends('layouts.app')

@section('content')

@section('jumbo-title', 'Wyświetlanie użytkownika')

@include('inc.admin-navigation')
@include('inc.jumbotron')


<!--FormularzRejestracji-->
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="form-group">
                    <label for="firstName">Imię</label>
                    <input type="text" class="form-control" disabled name="firstName" id="firstName"
                           value="{{ $user->firstName }}" placeholder="Wpisz imię">
                </div>
                <div class="form-group">
                    <label for="lastName">Nazwisko</label>
                    <input type="text" class="form-control" disabled name="lastName" id="lastName" value="{{ $user->lastName }}"
                           placeholder="Wpisz nazwisko">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled name="email" id="email" value="{{ $user->email }}"
                           placeholder="Wpisz email">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Kraj</label>
                    <input type="text" class="form-control" disabled name="password_confirmation" id="password-confirm"
                           value="{{$user->country}}">
                </div>
            </div>
        </div>
        <!--.FormularzRejestracji-->
    </div>
@endsection
