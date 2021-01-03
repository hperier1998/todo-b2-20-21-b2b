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

@section('title', "THE board")


@section('content')
    <h2>Bienvenu dans le board {{$board->title}}</h2>
    @foreach ($board->users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
@endsection