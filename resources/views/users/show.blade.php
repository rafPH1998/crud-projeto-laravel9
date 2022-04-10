@extends('layouts.app')

@section('title', "Listagem dos Usuário {$user->id}")

@section('content')
    <h1>Listagem do Usuário: {{$user->name}}</h1>

    <ul>
        <li>
            Nome:
            {!!$user->name!!} <br> 
            E-mail:
            {!!$user->email!!}
        </li>
        <a href="{{route('users.index')}}">Voltar</a>
    </ul>
@endsection