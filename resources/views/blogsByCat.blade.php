
@extends('layouts.app')

@section('title', 'Associated Blogs')

@section('content')

<h2>Blogs associated with "{{ $cat }}" Category</h2>

@if(count($blogs) > 0)

<div class="sports-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
            <div class="col-lg-8">
                <div class="row justify-content-center">


                    @foreach ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="news-card-thirteen">
                                <a href="{{ route('routeToClickedBlog', $blog->id) }}">
                                    <div class="news-card-img">
                                        <img src="{{ asset('uploads/' . $blog->image) }}" alt="Image">

                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">{{ $blog->title }}</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="news-by-date.html">{{ $blog->created_at }}</a></li>

                                        </ul>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{$blogs->links()}}

@else
<p>No results found.</p>
@endif
@endsection



{{-- @extends('layouts.app')

@section('title', 'Associated Blogs')

@section('content')

<h2>Blogs associated with "{{ $cat }}" Category</h2>

<ul>
    @foreach($blogs as $blog)
        <li><a href="{{ route('routeToClickedBlog', $blog->id) }}">{{ $blog->title }}</a></li>
    @endforeach
</ul>

@endsection --}}