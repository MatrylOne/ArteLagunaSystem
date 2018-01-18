@extends('layouts.app')
@section('content')
@section('jumbo-title', 'Tworzenie nowej nagrody')
@include('inc.admin-navigation')
@include('inc.jumbotron')
<form method="post" action="{{route('awards.store')}}">
    {{csrf_field()}}
    <div class="form-row">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Nazwa">
        </div>
        <div class="col">
            <input type="number" name="place" class="form-control" placeholder="Miejsce">
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Opis">
        </div>
        <div class="col">
            <select name="category" class="form-control" id="exampleFormControlSelect1">
                @foreach($categories->groupBy('edition_id')->reverse() as $categoryGroup)
                    <optgroup>
                        @foreach($categoryGroup as $category)
                            <option value="{{$category->id}}">{{$category->edition->year.'/'.$category->name}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit">Dodaj</button>
</form>
@endsection
