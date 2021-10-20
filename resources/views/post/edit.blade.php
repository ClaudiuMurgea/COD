<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Splash Creative</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <h2>Edit post!</h2>

    <form action="/post/{{ $post->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
    

    <input type="text" name="title" value="{{ $post->title }}">
        
    <input type="text" name="description" value="{{ $post->description }}">

    <select name="category_id">
        <option> Select Category </option>
        @foreach ($cats as $cat)
        <option value="{{ $cat->id }}" {{ ( $cat->id == $post->category_id ) ? 'selected' : '' }}>{{ $cat->categoryname}}</option>         
        @endforeach
    </select>

    <select name="city_id">
        @foreach ($cities as $city)
        <option value="{{ $city->id }}" {{ ( $city->id == $post->city_id ) ? 'selected' : '' }}>{{ $city->cityname}}</option>         
        @endforeach
    </select>

    <select name="type_id">
        @foreach ($types as $type)
        <option value="{{ $type->id }}" {{ ( $type->id == $post->type_id ) ? 'selected' : '' }}>{{ $type->typename}}</option>         
        @endforeach
    </select>

    <button type="submit" class="btn btn-success">Submit</button>
    </form>

    @endsection
</body>
</html>