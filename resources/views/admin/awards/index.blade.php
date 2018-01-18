@extends('layouts.app')
@section('content')

    @include('inc.admin-navigation')
    @include('inc.jumbotron')

    <a href="{{route('awards.create')}}" class="btn btn-primary mb-4">+</a>

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
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('awards.show', $award->id)}}">Pokaż</a>
                                    <a class="dropdown-item" href="{{route('awards.give', $award->id)}}">Przydziel</a>
                                    <a class="dropdown-item" href="{{route('awards.edit', $award->id)}}">Edytuj</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{route('awards.destroy', $award->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="dropdown-item">Usuń</button>
                                    </form>
                                </div>
                            </div>
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
@endsection
