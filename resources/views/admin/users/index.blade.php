@extends('layouts.app')

@section('content')

    @include('inc.admin-navigation')

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Kraj</th>
            <th scope="col">Aktywacja</th>
            <th scope="col">Administrator</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Opcje
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('users.show', $user->id)}}">Pokaż</a>
                            <form action="{{route('users.flipActive', $user->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <button type="submit"
                                        class="dropdown-item">{{$user->isActive()?"Dezaktywuj":"Aktywuj"}}</button>
                            </form>
                            <a class="dropdown-item" href="{{route('users.edit', $user->id)}}">Edytuj</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{route('users.flipAdmin', $user->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <button type="submit"
                                        class="dropdown-item">{{$user->isAdmin()?"Mianuj użytkowmnikiem":"Mianuj administratorem"}}</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="dropdown-item">Usuń</button>
                            </form>
                        </div>
                    </div>
                </th>
                <td>{{$user->firstName}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->country}}</td>
                <td>{{$user->isActive}}</td>
                <td>{{$user->isAdmin}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
