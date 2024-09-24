@extends('layout')
@extends('title','Questions')
@section('content')
    <div class="container">
        <h1>Questions for Category: {{ $category->name }}</h1>

        <a href="{{ asset('admin/categories/questions', $category->id) }}" class="btn btn-primary">Add New Question</a>

        <table class="table table-striped mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Type</th>
                <th>Required</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category->questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->type }}</td>
                    <td>{{ $question->is_required ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.categories.questions.edit', [$category->id, $question->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.categories.questions.destroy', [$category->id, $question->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
