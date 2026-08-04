@extends('layouts.app')

@section('title', 'Category Management')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Category Management</h2>
            <p class="text-muted">Manage all medicine categories.</p>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                + Add Category
            </a>
        </div>

    </div>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- Search Box --}}
    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="{{ route('category.index') }}" method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Search Category..."
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-success w-100">
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Category Table --}}
    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">Category List</h4>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Category Name</th>

                        <th>Description</th>

                        <th>Created At</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td>{{ $category->category_name }}</td>

                            <td>{{ $category->description }}</td>

                            <td>{{ $category->created_at->format('d M Y') }}</td>

                            <td>

                                <a href="{{ route('category.edit',$category->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('category.destroy',$category->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this category?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center text-danger">

                                No Categories Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection