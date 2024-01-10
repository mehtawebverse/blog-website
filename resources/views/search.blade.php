<!-- resources/views/search.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Search Results for "{{ $query }}"</h2>

    @if(count($posts) > 0)
        <ul>
            @foreach($posts as $post)
                <li class="btn-two">
                    <a href="{{ route('routeToClickedBlog', $post->id) }}" style="color: white;">{{ $post->title }}</a>
     </li> 
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
@endsection
