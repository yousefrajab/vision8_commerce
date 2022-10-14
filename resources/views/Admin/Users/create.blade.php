@extends('admin.master')

@section('title', 'Create User | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('site.Create New User') }}</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@include('admin.errors')

<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>{{ __('site.Name') }}</label>
        <input type="text" name="name" placeholder="{{ __('site.Name') }}" class="form-control" />
    </div>

    <div class="mb-3">
        <label>{{ __('site.Email') }}</label>
        <input type="Email" name="email" placeholder="{{ __('site.Email') }}" class="form-control" />
    </div>
    <label >{{ __('site.Password') }}</label>
            <div class="mb-3">
                <input type="Password" placeholder="{{ __('site.Password') }}" name="password" class = "form-control mb-3" autocomplete="new-password"/>
            </div>



    {{-- <div class="mb-3">
        <label>{{ __('site.Email') }}</label>
        <input type="Email" placeholder="Email" name="Email" class="form-control @error('Email') is-invalid  @enderror" />
        @error('Email')
    <small class="invalid-feedback ">{{ $message }}</small>
    @enderror
    </div> --}}

    {{-- <div class="mb-3">
        <label>{{ __('site.Arabic Name') }}</label>
        <input type="text" name="name_ar" placeholder="{{ __('site.Enter Arabic Name') }}" class="form-control" />
    </div> --}}

    {{-- <div class="mb-3">
        <label>{{ __('site.French Name') }}</label>
        <input type="text" name="name_fr" placeholder="{{ __('site.Enter French Name') }}" class="form-control" />
    </div>  --}}
{{--
    <div class="mb-3">
        <label for="image">{{ __('site.Image') }}</label>
        <input type="file" id="image" name="image" class="form-control" />
    </div> --}}

  {{-- <div class="mb-3">
        <label>{{ __('site.Parent') }}</label>
        <select name="parent_id" class="form-control">
            <option value="">{{ __('site.Select') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->Trans_name }}</option>
            @endforeach
        </select>
    </div> --}}


   <button class="btn btn-success px-5">{{ __('site.Add') }}</button>


</form>

@stop
