@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <p><a href="/users/create" class="btn btn-info">Add</a></p>

    <table class="table" id="users-list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Phone</th>
            <th scope="col">Photo</th>
            <th scope="col">Position</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <p><button type="button" class="btn btn-success" id='load-more' data-page="1">Load more</button></p>

@endsection
