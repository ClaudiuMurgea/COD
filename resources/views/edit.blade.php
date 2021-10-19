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

    <form action="/{{ $post->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
    

    <input type="text" name="title" value="{{ $post->title }}">

    <input type="text" name="description" value="{{ $post->description }}">

    <input type="file" name="image">

    <button type="submit" class="btn btn-success">Submit</button>
    </form>

    @endsection
</body>
</html>