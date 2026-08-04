@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Add Category</h3>
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

            <form action="{{ route('category.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Category Name</label>

                    <input type="text"
                           name="category_name"
                           class="form-control"
                           value="{{ old('category_name') }}"
                           placeholder="Enter Category Name">

                </div>

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              placeholder="Enter Description">{{ old('description') }}</textarea>

                </div>

                <button type="submit" class="btn btn-success">
                    Save Category
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
