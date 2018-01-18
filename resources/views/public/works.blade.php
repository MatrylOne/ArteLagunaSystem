@extends('layouts.app')

@section('content')
@section('jumbo-title', "Prace")
@include('inc.jumbotron')
@foreach($works->groupBy(function($work){return $work->category->edition_id;}) as $workGroup)
    <div class="container">
        @if($workGroup->count() > 0)
            <h2>{{$workGroup->first()->category->edition->year}}</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Miejsce</th>
                </tr>
                </thead>
                <tbody>
                @foreach($workGroup as $work)
                    <tr>
                        <td>{{$work->name}}</td>
                        <td>{{$work->category->name}}</td>
                        <td>
                            @foreach($work->users as $user)
                                {{$user->firstName.' '.$user->lastName}}</br>
                            @endforeach
                        </td>
                        <td>{{$work->award != null?$work->award->place:"---"}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>
@endforeach
@endsection
