@extends('layouts.app')

@section('title', 'Blog Page')

@section('content')

@yield('scripts')

@if (isset($updateMode))
<script>
    
    // Pass the route information to the external JavaScript file
    var blogId = {{ $show_blog->id }};
    var routeToEditBlog = "{{ route('routeToEditBlog', ['id' => ':id']) }}";
    routeToEditBlog = routeToEditBlog.replace(':id', blogId);

    // Access the route information in the external JavaScript file
    window.blogRoute = routeToEditBlog;
</script>
@endif

    <main>
        <section>
            <div class="container">



                <h2>{{ isset($updateMode) ? 'Edit blog' : 'Add Blog' }}</h2>




                <form method="post" id = "blogForm"
                    action="{{ isset($updateMode) ? route('routeToEditBlog', $show_blog->id) : route('routeToAddBlog') }}"
                   
                    enctype="multipart/form-data" class="grid-form"
                    data-updatemode="{{ isset($updateMode) ? true : false }}">
                    @csrf


                    <div class="form-group">
                        <label for="categories">Categories:</label>
                        <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
                            @foreach ( $cats as $category )
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags:</label>
                        <select class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                            @foreach ( $tags as $tag )
                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title"
                            value="{{ isset($updateMode) ? $show_blog->title : '' }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control tinymce-editor" required >
                        {{ isset($updateMode) ? $show_blog->description : '' }}
                    </textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image">
                    </div>

                   

                    

                    <div class="form-group">
                        <button type="submit" class="btn-four" id="abutt">

                            {{ isset($updateMode) ? 'Update' : 'Submit' }}

                        </button>
                    </div>
                </form>






            </div>
        </section>
    </main>

@endsection
