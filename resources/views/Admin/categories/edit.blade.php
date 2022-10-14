@extends('admin.master')

@section('title', 'Edit Category | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('site.Edit Category') }}</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
        <label>{{ __('site.English Name') }}</label>
        <input type="text" name="name_en" placeholder="{{ __('site.Enter English Name') }}" class="form-control" value="{{ $category->name_en }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('site.Arabic Name') }}</label>
        <input type="text" name="name_ar" placeholder="{{ __('site.Enter Arabic Name') }}" class="form-control" value="{{ $category->name_ar }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('site.French Name') }}</label>
        <input type="text" name="name_fr" placeholder="{{ __('site.Enter French Name') }}" class="form-control" value="{{ $category->name_fr }}" />
    </div>

    <div class="mb-3">
        <label for="image">{{ __('site.Enter Image') }}</label>
        <input type="file" id="image" name="image" class="form-control" />
        <img width="80" src="{{ asset('uploads/categories/'.$category->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>{{ __('site.Parent') }}</label>
        <select name="parent_id" class="form-control">
            <option value="">{{ __('site.Select') }}</option>
            @foreach ($categories as $item)
                <option {{ $category->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->Trans_name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success px-5">{{ __('site.Updated') }}</button>


</form>

@stop
