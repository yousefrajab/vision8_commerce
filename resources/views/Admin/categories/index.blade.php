@extends('Admin.master')
@section('title', 'Category | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All Categories</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
    <table class="table table-borderd table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>parent</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>

                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img width="80" src="{{ asset('uploads/categories/'. $category->image) }}" alt="">
                    </td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at ? $category->created_at->diffForHumans() : '' }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return comfirm('Are you sure???')"><i
                                    class="fas fa-trash">
                                </i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@stop
