@extends('layouts.app')
@section('content')


        <form action="/type/{{ $type->id }}/edit" method="POST">
            @csrf
    <div class="row">  
        <div class="form-group col-md-3">
        <label for="category"> City name</label>          
        <input type="text" name="name" class="form-control " value="{{ $type->typename }}">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>
    
       
    </div>
        <div class="form-group col-md-12">
            <button class="btn btn-primary ml-3" type="submit">Submit</button>
        </div>
    </div>
</form>

<a href="/city/list">Check existing cities</a>
@endsection