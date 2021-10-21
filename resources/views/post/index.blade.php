@extends('layouts.app')
          <h5>Move down</h5>
          <h5>Move down</h5>
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

          <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
              <li class="nav-item active nav-link">
          <div>
            <div><a href="/post/create">Add post&rarr;</a></div>             
          </div>
            </li>
            <li class="nav-item active nav-link">
            <a href="/category/create">Add Category&rarr;</a>    
            </li>
            <li class="nav-item active nav-link">
          <div><a href="/city/create">Add City&rarr;</a></div>
            </li> 
            <li class="nav-item active nav-link">
              <div><a href="/type/create">Add Type&rarr;</a></div>
            </li> 
          </ul>
        </nav>
          

        @foreach($posts as $post)
        {{-- Post Title --}}
        <h4 class="card-title mt-5 text-center">{{ $post->title }}</h4>
        <h5>
          {{ $post->City->cityname }} / {{ $post->Category->categoryname }} / {{ $post->Type->typename }}
        </h5>
        {{-- Image --}}
        <img src="{{ asset('images/' . $post->image_path) }}" class="col-md-6 col-xs-6 img-fluid offset-3" alt="Image">

        {{-- Post Description--}}
        <p class="card-text text-center">{{ $post->description }}</p>

        {{-- Edit --}}
        <div class="float-right"><a href="/{{ $post->id }}/edit" class="btn btn-success">Edit post!&rarr;</a></div>

        {{-- Submit --}}
        <div class="float-right"><a href="/create" class="btn btn-primary">Add post&rarr;</a></div>

        {{-- @if($post->status == 'active')
        <h6 class="btn btn-warning">&laquo; Premium &laquo;</h6>
        @else
        <h6 class="btn btn-light">&laquo;&laquo;&laquo; FREE &laquo;&laquo;&laquo;</h6>
        @endif --}}

 
        {{-- Delete --}}
        <form action="/{{ $post->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete post!</button>
        </form>
      @endforeach   
      </div>
    </div>
  </div>
</div>