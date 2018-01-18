@extends('layouts.app')

@section('content')
@section('jumbo-title', "Nagrody")
@include('inc.jumbotron')
<div class="container">
    @foreach($awards->groupBy(function($item){return $item->category->edition_id;})->reverse() as $awardsGroup)
        @if(count($awardsGroup)>0)
            <h2>{{$awardsGroup[0]->category->edition->year}}</h2>
            <table class="table mb-5">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Miejsce</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Przydzielono</th>
                    <th scope="col">Edycja</th>
                </tr>
                </thead>
                <tbody>
                @foreach($awardsGroup as $award)
                    <tr>
                        <th scope="row">
                        </th>
                        <td>{{$award->name}}</td>
                        <td>{{$award->description}}</td>
                        <td>{{$award->place}}</td>
                        <td>{{$award->category->name}}</td>
                        <td>{{$award->work == null?"---":$award->work->name}}</td>
                        <td>{{$award->category->edition->year}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</div>
@endsection
