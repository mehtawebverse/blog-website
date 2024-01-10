@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<main>
    <section>
        <div class="container">
            <h1>All Categories</h1>

            @if($list->count()>0)
                <table class="cats-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            
                            <th>Slug</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $cats)
                            <tr class="cats-item">
                               
                                <td class="cats-category">{{ Str::limit($cats->cat_name, 50) }}</td>
                                <td class="cats-slug">{{ $cats->slug }}</td>
        
                                <td>
                                   
                                    <form action="{{route('routeToDeleteCat',$cats->id)}}" method="POST" style="display:inline;">
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
                <p>No catss found.</p>
            @endif
        </div>
    </section>
</main>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .cats-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .cats-table th, .cats-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .cats-title {
        font-size: 1.5em;
    }

    .cats-image img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }
</style>
@endsection