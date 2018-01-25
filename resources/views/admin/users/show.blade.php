@extends('layouts.app')

@section('content')
@include('inc.admin-navigation')

<!--FormularzRejestracji-->
<div class="container mt-5">
    <h2>Dane użytkownika</h2>
    <table class="table">
        <thead class="thead-primary">
        <tr>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Email</th>
            <th scope="col">Kraj</th>
        </tr>
        </thead>
        <tbody>
            <td>{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->country}}</td>
        </tbody>
    </table>
</div>
<div class="container mt-5">
    @if($user->works->count() > 0)
        <h2>Prace użytkownika</h2>
        <table class="table">
            <thead class="thead-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa pracy</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Edycja</th>
                <th scope="col">Współutorzy</th>
                <th scope="col">Miejsce</th>
                <th scope="col">Nagroda</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($user->works as $work)
                @php ($frends = $work->users->reject(function($author) use ($user){return $author->id == $user->id;}))

                <tr>
                    <td>{{$i}}</td>
                    <td>{{$work->name}}</td>
                    <td>{{$work->category->name}}</td>
                    <td>{{$work->category->edition->year}}</td>
                    <td>
                        @if($frends->count() > 0)
                            @foreach($frends as $frend)
                                {{$frend->firstName.' '.$frend->lastName}}<br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($work->award != null)
                            {{$work->award->place}}
                        @endif
                    </td>
                    <td>
                        @if($work->award != null)
                            {{$work->award->name}}
                        @endif
                    </td>
                </tr>
                @php($i++)
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
