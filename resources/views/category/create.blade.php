@extends('layouts.app')
@section('content')

<h2>Add a post!</h2>

<div class="col-sm-10 col-sm offset-2">
<div class="container">
    <form action="/" method="POST" enctype="multipart/form-data">
    @csrf

        <label for="subcategory">
            Subcategory&rarr;
        </label>
        
        <select name="category">
            @foreach ($cats as $cat)           
            <option value="{{ $cat->id }}" {{ ( $cat->id == 1 ) ? 'selected' : '' }}>{{ $cat->categoryname }}</option>
            @endforeach
        </select>

    <div class="form-group">

        <label for="category">
            Category 
        </label>

        <select name="category">
            @foreach ($cats as $cat)
            <option value="{{ $cat->id }}" {{ ( $cat->id == 1 ) ? 'selected' : '' }}>{{ $cat->categoryname}}</option>         
            @endforeach
        </select>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</div>
@endsection