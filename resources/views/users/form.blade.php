@extends('layouts.app')

@section('title', "Adicionar novo Usuário")

@section('content')
    <div class="w-3/4 bg-white shadow-md rounded px-8 py-12 m-auto my-10">
        <h1 class="text-2xl font-semibold leading-tigh py-2">Adicionar novo Usuário</h1>

        @if ($errors->any())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4">
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('users.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label>
                <input type="text" name="name" placeholder="Digite seu Nome" value="{{old('name')}}" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                <input type="email" name="email" placeholder="Digite seu E-mail" value="{{old('email')}}" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                <input type="password" name="password" placeholder="Digite sua Senha" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <label>
                <input type="file" name="image" class="focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2">
            </label>
            <br/>

            <button type="submit" class="w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-4">
                Enviar
            </button>

            <a href="{{route('users.index')}}" type="submit" class="flex justify-center w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2">
                Voltar
            </a>
        </form>
    </div>
@endsection

