    @extends('layouts.app')
    @section('content')
    <h2>Add a post!</h2>

    <div class="col-sm-10 col-sm offset-2">
    <div class="container">
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf

    <input type="text" name="title" placeholder="Add a title...">

    <input type="text" name="description" placeholder="Post text...">

    <input type="file" name="image">

    <select name="status">
        <option value="inactive">Free</option>

        <option value="active">Premium</option>
    </select>

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

    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
</div>


    @endsection
