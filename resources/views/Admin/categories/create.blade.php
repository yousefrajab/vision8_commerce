@extends('Admin.master')
@section('title', 'Create Category | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create New Category</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
@include('Admin.errors')

<form action="{{ route('admin.categories.store') }}" method ="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label>English Name</label>
    <input type="text" placeholder="English Name" name="name_en" class="form-control" />
</div>
<div class="mb-3">
    <label>Arabic Name</label>
    <input type="text" placeholder="Arabic Name" name="name_ar" class="form-control" />
</div>
<div class="mb-3">
    <label for="image">Image</label>
    {{-- <label for="image"><img src="https://placekitten.com/120" alt=""></label> --}}
    {{-- <input id="image" type="file" name="image" class="form-control d-none" /> --}}
    <input id="image" type="file" name="image" class="form-control" />
</div>
<div class="mb-3">
    <label>Parent</label>
    <select name="parent_id" class="form-control">
       <option value="">Select</option>
       @foreach ($categories as $category )
        <option value="{{ $category->id }}
            ">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-success px-5">Add</button>
</form>
@stop
