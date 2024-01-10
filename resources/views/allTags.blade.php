@extends('layouts.app')

@section('title', 'All Tags')

@section('content')

<main>
    <section>
        <div class="container">
            <h1>All Tags</h1>

            @if($list->count()>0)
                <table class="tags-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            
                            <th>Slug</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $tags)
                            <tr class="tags-item">
                               
                                <td class="tags-category">{{ Str::limit($tags->tag_name) }}</td>
                                <td class="tags-slug">{{ $tags->slug }}</td>
        
                                <td>
                                   
                                    <form action="{{route('routeToDeleteTag',$tags->id)}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No tagss found.</p>
            @endif
        </div>
    </section>
</main>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .tags-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .tags-table th, .tags-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .tags-title {
        font-size: 1.5em;
    }

    .tags-image img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }
</style>
@endsection