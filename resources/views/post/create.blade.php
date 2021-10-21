    @extends('layouts.app')
    @section('content')
    <h2>Add a post!</h2>

    <div class="col-sm-10 col-sm">
    <div class="container">
    <form action="/post/store" method="POST" enctype="multipart/form-data">
        @csrf

    <input class="col-3 ml-3" type="text" name="title" placeholder="Add a title...">

    <input class="col-3 ml-3" type="text" name="description" placeholder="Post text...">

    <select name="parent_category" id="parent_category">
        <option value="">Select parent</option>
        @foreach ($parents as $parent)
        <option value="{{ $parent->id }}" >{{ $parent->categoryname}}</option>
        @endforeach
    </select>

    <select name="child_category" id="child_categories">
        <option value="">Select --child</option>
        
    </select>

    <select name="city_id">
        @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->cityname}}</option>         
        @endforeach
    </select>

    <select name="type_id">
        @foreach ($types as $type)
        <option value="{{ $type->id }}" >{{ $type->typename}}</option>         
        @endforeach
    </select>

    <input class="col-3" type="file" name="image">

    <button type="submit" class="btn btn-success ml-3">Submit</button>
    </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            
        });
    })
    
    $('#parent_category').change(function(){
        let selectedParent = $(this).val();

        //ajax request
        $.ajax({
            url: "/getChildrenOfParents/"+selectedParent,
            type: "post",
        
        success: function (response) {

            if(response.errrors){
                alert(response.message)
                return;
            }
            $('#child_categories')
                .find('option')
                .remove()

            $('#child_categories')
                .append($("<option></option>")
                            .attr("value", '')
                            .text('Select Child')); 
            if(response.message.length === 0){
                   return;
            
            }
            
            $.each(response.message, function(key, value) {   
                $('#child_categories')
                    .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.categoryname)); 
            });
        
        },
       
    });

    })
    </script>
@endsection
