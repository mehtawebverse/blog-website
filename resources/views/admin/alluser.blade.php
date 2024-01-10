@extends('layouts.app')

@section('title', 'All Users')

@section('content')

<main>
    <section>
        <div class="container">
            <h1>All Users</h1>

            @if($users->count() > 0)
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="user-item">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('routeToDeleteuser', $user->id) }}" method="POST" style="display:inline;">
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
                <p>No users found.</p>
            @endif
        </div>
    </section>
</main>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th, .user-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

</style>

@endsection
