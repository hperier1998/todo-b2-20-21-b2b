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

@section('title', "Edit board" . $board->title)


@section('content')
    <p>Add a board </p>
    <div>
        <form action="{{route('boards.update', $board)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">title</label>
            <input id="title" name="title" type="text" class="@error('title') is-invalid @enderror" value="{{$board->title}}">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label for="description">Description</label>
            <input type='textarea' name='description' id="description" value="{{$board->description}}">
            <br>
            <button type="submit">Update</button>
        </form>

    </div>
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