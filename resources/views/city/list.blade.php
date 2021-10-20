@extends('layouts.app')
@section('content')

    <h2>Cities</h2>

    <table class="table stripped">
        <thead>
            <tr>
                <td>
                    &laquo;&laquo;Cities&laquo;&laquo;<a href="/city/create" class="btn btn-warning ml-5">&larr;Add</a>
                </td>
            </tr>
        </thead>
        <tbody>             
                    @foreach ($cities as $city)
                <tr>
                    <td>
                        {{ $city->cityname }}
                    </td>
                    <td>
                        <a href="/city/{{ $city->id }}/edit" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="/city/{{ $city->id }}">
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