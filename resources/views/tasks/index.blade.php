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

@section('title', "Board's tasks")


@section('content')
    <h2>{{$board->title}}</h2>
    <h3>Liste des tâches</h3>
    @if(count($board->tasks ) == 0)
            <a href="{{route('tasks.create', $board)}}">Create a task</a>
        @else
            <a href="{{route('tasks.create', $board)}}">Add a task</a>
            @foreach ($board->tasks as $task)
            <p>{{ $task->title }}. 
                <a href="{{route('tasks.show', [$board, $task])}}">Details</a> <a href="{{route('tasks.edit', [$board, $task])}}">edit</a></p>
                <form action="{{route('tasks.destroy', [$board, $task])}}" method='POST'>
                    @method('DELETE')
                    @csrf

                    <button type="submit">Delete</button>
                </form>
            @endforeach
    @endif
@endsection