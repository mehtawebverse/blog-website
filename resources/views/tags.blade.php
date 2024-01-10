@extends('layouts.app')
@section('title','Tags')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Tag</div>

                <div class="card-body">
                    <form method="POST" action="{{route('routeToAddTag')}}">
                        @csrf

                        <div class="form-group">
                            <label for="tag_name">Tag Name</label>
                            <input type="text" class="form-control" id="tag_name" name="tag_name" value="{{ old('tag_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection