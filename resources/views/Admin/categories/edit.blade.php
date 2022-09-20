@extends('Admin.master')
@section('title', 'Edit Category | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.Edit Category') }}</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
@include('Admin.errors')

<form action="{{ route('admin.categories.update',$category->id) }}" method ="POST" enctype="multipart/form-data">
@csrf
@method('put')
<div class="mb-3">
    <label>English Name</label>
    <input type="text" placeholder="English Name" name="name_en" class="form-control" value="{{ $category->name_en }}" />
</div>
<div class="mb-3">
    <label>Arabic Name</label>
    <input type="text" placeholder="Arabic Name" name="name_ar" class="form-control" value="{{ $category->name_ar }}"/>
</div>
{{-- <div class="mb-3">
    <label>Farench Name</label>
    <input type="text" placeholder="Farench Name" name="name_fr" class="form-control" value="{{ $category->name_fr }}" />
</div> --}}

<div class= "mb-3">
    <label for="image">Image</label>

    <input id="image" type="file" name="image" class="form-control" />
    <img width="80" src="{{ asset('uploads/categories/'. $category->image) }}" alt="">
</div>
<div class="mb-3">
    <label>Parent</label>
    <select name="parent_id" class="form-control" class="px-5">
       <option value="">Select</option>
       @foreach ($categories as $item )
        <option {{ $category->parent_id == $item->id ? 'selected' :  ''  }} value="{{ $item->id }}
            ">{{ $item->trans_name }}</option>
        @endforeach
    </select>
</div>
<div class="text-center mb-3">
    <button class="btn btn-success btn-hover mt-3">Update</button>
</div>

</form>
@stop
