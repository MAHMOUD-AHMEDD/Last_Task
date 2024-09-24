@extends('layout')
@section('title','categories|edit')
@section('content')
<div class="container">
    <h1>Edit Category: {{ $category->name }}</h1>

    <form action="{{ asset('admin/categories/update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
@endsection
