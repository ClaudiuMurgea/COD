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

    <form action="/post/{{ $post->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
    

    <input type="text" name="title" value="{{ $post->title }}">
        
    <input type="text" name="description" value="{{ $post->description }}">

    <select name="category_id" id="category_id">
        @foreach ($parents as $parent)
        <option value="">Select Child</option>
        <option value="{{ $parent->id }}" {{ ( $parent->id == $post->category_id ) ? 'selected' : '' }}>
            @if(($parent->category_id) == NULL) {{ $parent->categoryname}} @endif
        </option>         
        @endforeach
    </select>

    <select name="child_id" id="child_id">
        <option value="">Select Child</option>
        @foreach ($children as $child)
            <option value="{!! $child->id !!}" {!! $child->id == $post->subcategory_id ? 'selected' : '' !!}>{!! $child->categoryname !!}</option>
            
        @endforeach
    </option>
    </select>

    <select name="city_id">
        @foreach ($cities as $city)
        <option value="{{ $city->id }}" {{ ( $city->id == $post->city_id ) ? 'selected' : '' }}>{{ $city->cityname}}</option>         
        @endforeach
    </select>

    <select name="type_id">
        @foreach ($types as $type)
        <option value="{{ $type->id }}" {{ ( $type->id == $post->type_id ) ? 'selected' : '' }}>{{ $type->typename}}</option>         
        @endforeach
    </select>

    <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            
        });
    })
    
    $('#category_id').change(function(){
        let selectedParent = $(this).val();

        //ajax request
        $.ajax({
            url: "/getChildrenOfParents/"+selectedParent,
            type: "post",
        
        success: function (response) {

            console.log(response)
            if(response.errrors){
                alert(response.message)
                return;
            }
            $('#child_id')
                .find('option')
                .remove()

            $('#child_id')
                .append($("<option></option>")
                            .attr("value", '')
                            .text('Select Child')); 
            if(response.message.length === 0){
                   return;
            
            }
            
            $.each(response.message, function(key, value) {   
                $('#child_id')
                    .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.categoryname)); 
            });
        
        },
       
    });

    })
    </script>

    @endsection
</body>
</html>