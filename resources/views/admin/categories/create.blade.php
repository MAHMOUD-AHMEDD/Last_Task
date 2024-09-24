@extends('layout')
@section('title','create|category')
@section('content')

    <div class="container">
        <h1>Create New Category</h1>
{{--ERROR !!!!!!!!!!!!!!!!!!!!!!--}}
        <form action="{{ asset('admin/categories') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Create Category</button>
        </form>
    </div>


@endsection
