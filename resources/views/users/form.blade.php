@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    <p><a href="/" class="btn btn-info">Back</a></p>

    <form id="create-user-form" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter phone">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" placeholder="Enter photo">
        </div>
        <div class="form-group">
            <label for="position_id">Position</label>

            <select class="form-control" id="position_id">

            </select>

        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
