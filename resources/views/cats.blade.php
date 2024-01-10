@extends('layouts.app')
@section('title','Categories')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category</div>

                <div class="card-body">
                    <form method="POST" action="{{route('routeToAddCats')}}">
                        @csrf

                        <div class="form-group">
                            <label for="cat_name">Category Name</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{ old('cat_name') }}" required>
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