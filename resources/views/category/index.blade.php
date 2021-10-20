@extends('layouts.app')
@section('content')

<form action="/category/store" method="POST">
@csrf
    <div class="row">  
        <div class="form-group col-md-3">
            <label for="category"> Nume </label>
            <input type="text" name="nume" class="form-control " placeholder="Category name...">

            @error('nume')
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>

    <div class="form-group col-md-3">
        <label for="category"> Nume </label>
            <select type="text" name="parentid" class="form-control">
                <option value="">Select parent</option>

                @foreach ($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->categoryname }}</option>
                @endforeach
            </select>

            @error('parentid')
            <span class="text-danger">{{ $message }}</span>
            @enderror     
    </div>

    <div class="form-group col-md-12">
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
</form>

<a href="/category/list" class="btn btn-primary">Check categories</a>
@endsection