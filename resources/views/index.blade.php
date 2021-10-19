@extends('layouts.app')

<div class="row">
  <div class="mx-auto">
  {{-- Login to post --}}
  @if(!Auth::user())
  <div class="text-right"> <a href="/login" class="btn btn-light">Login to add a post!&rarr;</a></div>
  @endif

  {{-- Now you can post --}}
  {{-- @if(Auth::user())
  <div> <a href="/create" class="btn btn-light">Add a post!&rarr;</a></div> --}}

  {{-- Log out --}}
  {{-- <a class="dropdown-item" href="{{ route('logout') }}"
  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>
    @endif --}}
  </div>
</div>
          <div class="col-sm-10 col-sm offset-1 mt-5 text-center">
            <a href="/category/create">Add Category</a>
          </div>


        @foreach($posts as $post)
        {{-- Post Title --}}
        <h4 class="card-title mt-5 text-center">{{ $post->title }}</h4>

        {{-- Image --}}
        <img src="{{ asset('images/' . $post->image_path) }}" class="col-md-6 col-xs-6 img-fluid offset-3" alt="Image">

        {{-- Post Description--}}
        <p class="card-text text-center">{{ $post->description }}</p>

        {{-- Edit --}}
        <div class="float-right"><a href="/{{ $post->id }}/edit" class="btn btn-success">Edit post!&rarr;</a></div>

        {{-- Delete --}}
        <form action="/{{ $post->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete post!</button>
        </form>

        @if($post->status == 'active')
        <h6 class="btn btn-warning">&laquo; Premium &laquo;</h6>
        @else
        <h6 class="btn btn-light">&laquo;&laquo;&laquo; FREE &laquo;&laquo;&laquo;</h6>
        @endif

        {{-- Submit --}}
        <div class="float-right"><a href="/create" class="btn btn-primary">Add post&rarr;</a></div>
      @endforeach   
      </div>
    </div>
  </div>
</div>