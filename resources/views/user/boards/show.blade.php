<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard | ') }}
    </x-jet-nav-link> 
    <!-- Creates a button shortcut to go to your boards -->
    <x-jet-nav-link href="{{ route('boards.index') }}" :active="request()->routeIs('boards.index')">
        {{ __('Your Boards ') }}
    </x-jet-nav-link>
</div>

@extends('layouts.main')

@section('title', "User's board " . $board->title)


@section('content')
    <h2>{{$board->title}}</h2>
    <p>{{$board->description}}</p>
    <div class="participants">
        @foreach($board->users as $user) 
            <p>{{$user->name}}</p>
            <form action="{{route('boards.boarduser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
        @endforeach
    </div>

    <a href="{{route('tasks.index', $board)}}"> <button>See your tasks linked to the board</button></a> 

    <form action="{{route('boards.boarduser.store', $board)}}" method="POST">
        @csrf
        <select name="user_id" id="user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} : {{$user->email}}</option>
            @endforeach
        </select>
        @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Ajouter</button>
    </form>

@endsection