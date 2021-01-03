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

@section('title', "Update a task")


@section('content')
    <p>Add a board </p>
    <div>
        <form action="{{route('tasks.update', [$board, $task])}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">title</label>
            <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror" value="{{$task->title}}">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label for="description">Description</label>
            <input type='textarea' name='description' id="description"  value="{{$task->description}}">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="due_date">Date de fin</label>
            <input type='date' name='due_date' id="due_date"  value="{{$task->due_date}}" >
            <br>
            <select name="category_id" id="category_id" value="{{$task->category_id}}">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <select name="state" id="state" value="{{$task->state}}">
                @foreach (['todo', 'ongoing', 'done'] as $state)
                <option value="{{$state}}">{{$state}}</option>
                @endforeach
            </select>
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit">Create</button>
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