@extends('layouts.app')
@section('content')

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categ-name">
            Category Name 
        </label>
        <select name="form-control" name="category">
            @foreach ($subs as $sub)
                <option value="{{ $sub->id }}" {{ ($sub->id == 1 ) ? 'selected' : ''}}> {{ $sub->subcategoryname }}</option>
            @endforeach

        </select>
    </div>

@endsection