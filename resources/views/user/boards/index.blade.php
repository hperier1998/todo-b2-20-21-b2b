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

@section('title', "User's board")


@section('content')
    @if(count($boards) == 0)
        <p>Vous n'avez aucun board</p>
        <a href="{{route('boards.create')}}">Create a board.</a>  <!-- Option to create a board when its none existing -->
    @else
        <p>Il faut parcourir et afficher tous le boards. </p>
    @endif
    @foreach ($boards as $board)
        <p>This is board {{ $board->title }}. 
            @can('view', $board)
            <a href="{{route('boards.show', $board)}}">detail</a> 
            @endcan
            @can('update', $board)
            <a href="{{route('boards.edit', $board)}}">edit</a></p></p>
            @endcan
            @can('delete', $board)
            <form action="{{route('boards.destroy', $board->id)}}" method='POST'>
                @method('DELETE')
                @csrf
                
                <button type="submit">Delete</button>
            </form>
            @endcan
    @endforeach
@endsection