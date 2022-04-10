@extends('layouts.app')

@section('title', "Editar Comentário do Ysuário {$user->name}")

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Comentário do Usuário: {{$user->name}}</h1>

    @if ($errors->any())
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4">
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-3/4 bg-white shadow-md rounded px-8 py-12 m-auto my-10">
        <form action="{{route('comments.update', $comment->id)}}" method="post">
            @method("PUT")
            @csrf
            <textarea name="body" placeholder="Digite um comentário" cols="30" rows="5" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">{{$comment->body}}</textarea>
            
            <label for="visible">
                <input type="checkbox" name="visible" @if(isset($comment) && $comment->visible) @checked(true) @endif>
                Visível?
            </label>

            <button type="submit" class="w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-4">
                Enviar
            </button>

            <a href="{{route('users.index')}}" type="submit" class="flex justify-center w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2">
                Voltar
            </a>
        </form>
    </div>
@endsection

