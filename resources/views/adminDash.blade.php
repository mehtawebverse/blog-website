<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app') <!-- Assuming you have an admin layout file in resources/views/layouts/admin.blade.php -->

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}! (Role: Admin)</p>

                        <div class="mb-3">
                            
                            <a href="{{route('routeToAdminCustomize')}}" class="btn btn-success">Customize Blogs</a>
                            
                            <a href="{{route('routeToEditUsers')}}" class="btn btn-success">Users</a>

                            <a href="{{route('routeToViewCatPage')}}" class="btn btn-success">Categories</a>

                            <a href="{{route('routeToAllCats')}}" class="btn btn-success">Edit Categories</a>
                            
                            <a href="{{route('routeToAllTags')}}" class="btn btn-success">Edit Tags</a>
                            
                            <a href="{{route('routeToPendingBlogs')}}" class="btn btn-success">Change State</a>




                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
