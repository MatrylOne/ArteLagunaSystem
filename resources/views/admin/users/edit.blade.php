@extends('layouts.app')

@section('content')

@section('jumbo-title', 'Edycja użytkownika')

@include('inc.admin-navigation')
@include('inc.jumbotron')

<form method="post" action="{{route('users.update', $user->id)}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-row">
        <div class="col">
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
    </div>
    <button type="submit">Dodaj</button>
</form>

@endsection
