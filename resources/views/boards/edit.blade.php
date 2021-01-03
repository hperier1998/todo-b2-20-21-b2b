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

@section('title', "Edit a board for an user")


@section('content')
    <h2>Éditer un board</p>
        <form action="{{route('boards.update', $board)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="title">Title</label>
            <input type="text" name='title' 
                    id ='title' value="{{$board->title}}"
                    class="@error('title') is-invalid @enderror" required><br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="description">Description</label>
            <input type="text" name='description' id ='description' value="{{$board->description}}"
                    class="@error('description') is-invalid @enderror"><br>
            <button type="submit">Update</button>
        </form>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
@endsection