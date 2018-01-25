@extends('layouts.app')

@section('content')

@section('jumbo-title', 'Edycja użytkownika')
@section('jumbo-description', $user->firstName.' '.$user->lastName)
@include('inc.admin-navigation')
@include('inc.jumbotron')

<form method="post" action="{{route('users.update', $user->id)}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-row">
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="col-sm-2 text-center">
            <button class="btn btn-primary" type="submit">Zmień adres</button>
        </div>
    </div>
</form>

@endsection
