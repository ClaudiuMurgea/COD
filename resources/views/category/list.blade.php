@extends('layouts.app')
@section('content')

    <h2>Category list!</h2>

    <table class="table table-stripped">
        <thead>
            <tr>
                <td>
                    Nume
                </td>
                <td>
                    Parinte
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach($cats as $cat)
            <tr>
                <td>
                    {{ $cat->categoryname }}
                </td>
                <td>
                    {!! $cat->ParentCateg->categoryname ?? ''  !!} 
                </td>
                <td>
                    <a href="/category/{{ $cat->id }}/edit" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form action="/category/{{ $cat->id }}">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection