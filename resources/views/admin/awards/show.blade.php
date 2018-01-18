@extends('layouts.app')

@section('content')

@section('jumbo-title', 'Wyświetlanie nagrody')

@include('inc.admin-navigation')
@include('inc.jumbotron')


    <div class="form-row">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Nazwa" disabled value="{{$award->name}}">
        </div>
        <div class="col">
            <input type="number" name="place" class="form-control" placeholder="Miejsce" disabled value="{{$award->place}}">
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Opis" disabled value="{{$award->description}}">
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Opis" disabled value="{{$award->category->edition->year.'/'.$award->category->name}}">
        </div>
    </div>

@endsection
