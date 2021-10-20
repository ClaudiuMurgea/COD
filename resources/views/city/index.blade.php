@extends('layouts.app')
@section('content')

<form action="/city/store" method="POST">
@csrf
    <div class="row">  
        <div class="form-group col-md-3">
            <label for="category"> City name</label>
            <input type="text" name="name" class="form-control " placeholder="City name...">

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>         
    </div>

    <div class="form-group col-md-12">
        <button class="btn btn-success ml-3" type="submit">Submit</button>
    </div>
</form>

<a href="/city/list" class="ml-5 btn btn-primary">Check existing cities</a>
@endsection