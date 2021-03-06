@extends('layouts.app')
@section('content')
@section('jumbo-title', 'Przyznawianie nagrody')
@include('inc.admin-navigation')
@include('inc.jumbotron')
<form method="post" action="{{route('awards.setWork', $award->id)}}">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-row">
        <div class="col-sm-10">
            <select name="work" class="form-control" id="exampleFormControlSelect1">
                <optgroup label="Prace">
                    @foreach($works->filter(function($work){return $work->award == null;}) as $work)
                        <option value="{{$work->id}}">{{$work->name}}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Inne">
                    <option value="-1">Odbierz nagrodę</option>
                </optgroup>
            </select>
        </div>
        <div class="col-sm-2"><button class="btn btn-primary" type="submit">Przyznaj</button></div>
    </div>
</form>
@endsection
