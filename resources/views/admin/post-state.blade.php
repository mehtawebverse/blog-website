@extends('layouts.app')

@section('title', 'post state')

@section('content')



<main>
    <section>
        <div class="container">
            <h1>Posts with pending state</h1>

            @if($list->count()>0)
                <table class="blog-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $blog)
                        
                            <tr class="blog-item">
                                <td class="blog-title"> <a href="{{route('routeToClickedBlog',$blog->id)}}"> {{ Str::limit($blog->title,18) }} </a> </td>
                                <td class="blog-description">{!! Str::limit($blog->description, 50) !!}</td>
                                <td class="blog-status">{{ $blog->status }}</td>
                                <td class="blog-image">
                                    @if($blog->image)
                                        <img src="{{ asset('uploads/'.$blog->image) }}" alt="Blog Image" class="blog-image" height="100px" width="100px">
                                    @endif
                                </td>
                                <td>
                                    
                                    <a href="{{route ('routeToChangeState',$blog->id)}}" class="btn-three">Change State</a>
                                    
                                    <form action="{{route('routeToDeleteBlog',$blog->id)}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-three">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No blogs found.</p>
            @endif
        </div>
    </section>
</main>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .blog-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .blog-table th, .blog-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .blog-title {
        font-size: 1.5em;
    }

    .blog-image img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }
</style>



@endsection