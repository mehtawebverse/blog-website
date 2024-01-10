@extends('layouts.app')
@section('title','Pop Tags')

@section('content')
<div class="col-lg-4">
    <div class="sidebar">
        <div class="sidebar-widget">
            <h3 class="sidebar-widget-title">Popular Tags</h3>
            <ul class="tag-list list-style">
                @foreach($list as $tag)
                <li><a href="{{ route('routeToViewByTag', $tag->tag_name) }}">{{$tag->tag_name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection