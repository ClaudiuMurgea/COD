@extends('layouts.app')
@section('content')

<form action="/type/store" method="POST">
@csrf
    <div class="row">  
        <div class="form-group col-md-3">
            <label for="category"> City name</label>
            <input type="text" name="name" class="form-control" placeholder="Add Type...">

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>   
    </div>   

    <div class="form-group col-md-12">
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
</form>

<a href="/type/list" class="btn btn-primary ml-5">Check existing types</a>
@endsection