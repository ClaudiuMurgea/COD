@extends('layouts.app')
@section('content')

    <h2>Types</h2>

    <table class="table stripped">
        <thead>
            <tr>
                <td>
                    &laquo;&laquo;Type&laquo;&laquo;<a href="/type/create" class="btn btn-warning ml-5">&larr;Add</a>
                </td>
            </tr>
        </thead>
        <tbody>             
                    @foreach ($types as $type)
                <tr>
                    <td>
                        {{ $type->typename }}
                    </td>
                    <td>
                        <a href="/type/{{ $type->id }}/edit" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="/type/{{ $type->id }}">
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