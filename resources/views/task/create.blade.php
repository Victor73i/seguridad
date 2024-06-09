@extends('layouts.app')



@section('title','Add Task')

@section('content')

<form method="POST" action="{{route('tasks.store')}}">
    @csrf
    <div class="mb-4">
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" rows="5"
               @class(['border-red-500' => $errors->has('title')])
               value="{{ old('long_description')}}"/>
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description</label>
        <input text="text" name="description" id="description" rows="5"
               @class(['border-red-500' => $errors->has('description')])
               value="{{ old('long_description')}}"/>
        @error('description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">Long Description</label>
        <input text="text" name="long_description" id="long_description" rows="5"
               @class(['border-red-500' => $errors->has('long_description')])
               value="{{old('long_description')}}"/>
        @error('long_description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="flex items-center gap-2">
        <button type="submit" class="btn">Add Task</button>
        <a href="{{route('tasks.index')}}" class="link">Cancel</a>
    </div>
</form>

@endsection
