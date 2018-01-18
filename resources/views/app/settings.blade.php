@extends('layouts.app')

@section('content')
    @section('jumbo-title', "Ustawienia")
    @section('jumbo-description', 'Użytkownik: '.Auth::user()->firstName.' '.Auth::user()->lastName.'')
    @include('inc.jumbotron')
@endsection
