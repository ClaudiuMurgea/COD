    @extends('layouts.app')
    @section('content')
    <h2>Add a post!</h2>

    <div class="col-sm-10 col-sm">
    <div class="container">
    <form action="/post/store" method="POST" enctype="multipart/form-data">
        @csrf

    <input class="col-3 ml-3" type="text" name="title" placeholder="Add a title...">

    <input class="col-3 ml-3" type="text" name="description" placeholder="Post text...">

    <select name="category_id">
        @foreach ($cats as $cat)
        <option value="{{ $cat->id }}" {{ ( $cat->id == 1 ) ? 'selected' : '' }}>{{ $cat->categoryname}}</option>         
        @endforeach
    </select>

    <select name="city_id">
        @foreach ($cities as $city)
        <option value="{{ $city->id }}" {{ ( $city->id == 1 ) ? 'selected' : '' }}>{{ $city->cityname}}</option>         
        @endforeach
    </select>

    <select name="type_id">
        @foreach ($types as $type)
        <option value="{{ $type->id }}" {{ ( $type->id == 1 ) ? 'selected' : '' }}>{{ $type->typename}}</option>         
        @endforeach
    </select>

    {{-- <input class="col-3" type="file" name="image"> --}}
    
    {{-- <input class="col-3 ml-3" type="text" name="city" placeholder="City...">

    <select class="col-3 ml-3"   name="status">
        <option value="inactive">Free</option>

        <option value="active">Premium</option>
    </select> --}}

    {{-- <div class="form-group">
        <label for="subcategory">
            Subcategory&rarr;
        </label>
        <select name="category">
            @foreach ($cats as $cat)
                <option value="{{ $cat->id }}" {{ ( $cat->id == 1 ) ? 'selected' : '' }}>{{ $cat->categoryname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="category">
            Category &rarr;
        </label>
        <select name="category">
            @foreach ($cats as $cat)
            @if($cat->category_id)
                <option value="{{ $cat->id }}" {{ ( $cat->id == 1 ) ? 'selected' : '' }}>{{ $cat->categoryname}}</option>
            @endif
            @endforeach
        </select>
    </div> --}}

    <button type="submit" class="btn btn-success ml-3">Submit</button>
    </form>
    </div>
</div>

@endsection
