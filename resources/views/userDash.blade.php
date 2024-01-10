<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file in resources/views/layouts/app.blade.php -->

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}!</p>

                        <div class="mb-3">
                            <a href="{{route('addBlogRoute')}}" class="btn btn-primary">Add Blog</a>
                            <a href="{{route('routeToViewBlog')}}" class="btn btn-success">Customize Blogs</a>
                            <a href="{{route('routeToViewTagPage')}}" class="btn btn-success">Add Tags</a>
                            
                            
                      
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
