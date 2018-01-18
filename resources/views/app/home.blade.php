@extends('layouts.app')

@section('content')
@section('jumbo-title', 'Moje Konto')
@section('jumbo-description', $user->firstName.' '.$user->lastName)
@include('inc.jumbotron')

<div class="container">
    @if($user->works->count() > 0)
        @foreach($user->works as $work)
            @if($work->award != null)
                <h2>Moja nagroda</h2>
                <b>{{$work->award->name}}</b>
                <p>Miejsce {{$work->award->place}} w kategorii {{$work->award->category->name}} za pracę
                    "{{$work->name}}"</p>
            @endif
            <h2>Moja praca</h2>
            <p>{{$work->name}}</p>
            @php ($frends = $work->users->reject(function($author) use ($user){return $author->id == $user->id;}))
            @if($frends->count() > 0)
                <h2>Współautorzy</h2>

                @foreach($frends as $frend)
                    <p>{{$frend->firstName.' '.$frend->lastName}}</p>
                @endforeach
            @endif
        @endforeach
    @endif
</div>
@endsection
