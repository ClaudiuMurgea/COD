@extends('layouts.app')
@section('content')

<form action="/category/update/{!! $category->id !!}" method="POST">
@csrf
    <div class="row">  
        <div class="form-group col-md-3">

            <label for="category"> Nume </label>
            
            <input type="text" name="nume" class="form-control " value="{!! $category->categoryname !!}" placeholder="Category name...">

            @error('nume')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-3">

            <label for="category"> Nume </label>

            <select type="text" name="parentid" class="form-control " placeholder="Category name...">
                <option value="">Select parent</option>

                @foreach ($parents  as $parent)
                <option value="{{ $parent->id }}" {!! $parent->id == $category->category_id ? 'selected' : '' !!}>{{ $parent->categoryname }}</option>
                @endforeach 
            </select>

             @error('parentid')
            <span class="text-danger">{{ $message }}</span>
            @enderror  
        </div>

        <div class="form-group col-md-12">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>

<a href="/category/list">Check categories</a>
@endsection