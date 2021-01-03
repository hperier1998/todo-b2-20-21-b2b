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

@section('title', "User's boards")


@section('content')
    <p>Ici on va afficher les boards auxquels appartient l'utilisateur {{$user->name}}.</p>
    <div>Les boards de l'utilisateur</div>
    @foreach ($user->boards as $board)
        <p>Le board {{ $board->title }} : 
                <a href="{{route('boards.show', $board)}}">Voir</a>
                <a href="{{route('boards.edit', $board)}}">Edit</a>
                <form method='POST' action="{{route('boards.destroy', $board)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </p>
    @endforeach
@endsection