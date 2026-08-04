@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit Category</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('category.update', $category->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">Category Name</label>

                    <input type="text"
                           name="category_name"
                           class="form-control"
                           value="{{ old('category_name', $category->category_name) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description', $category->description) }}</textarea>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Category
                </button>

                <a href="{{ route('category.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
