@extends('layouts.app')

@section('title', "Editar Usuário: {$user->name}")

@section('content')
    <div class="w-3/4 bg-white shadow-md rounded px-8 py-12 m-auto my-10">
        <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Usuário: {{$user->name}}</h1>

        @if ($errors->any())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4">
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('users.editAction', $user->id)}}" method="post" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <label>
                <input type="text" name="name" placeholder="Digite seu Nome" value="{{$user->name}}" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                <input type="email" name="email" placeholder="Digite seu E-mail" value="{{$user->email}}" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                Senha:<br/>
                <input type="password" name="password" placeholder="Digite sua Senha" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                <input type="file" name="image" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <button type="submit" class="w-full shadow bg-sky-500 hover:bg-sky-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-4">
                Salvar
            </button>

            <a href="{{route('users.delete', $user->id)}}" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" class="flex justify-center w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2">
                Exluir
            </a>

            <a href="{{route('users.index')}}" type="submit" class="flex justify-center w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2">
                Voltar
            </a>
        </form>
    </div>
@endsection

