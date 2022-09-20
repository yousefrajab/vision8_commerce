@extends('Admin.master')
@section('title', 'Create Product | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.Create New Product') }}</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
@include('Admin.errors')

<form action="{{ route('admin.products.store') }}" method ="POST" enctype="multipart/form-data">
@csrf

@include('Admin.products._form')

<button class="btn btn-success px-5">Add</button>
</form>
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    tinymce.init({
        selector:'.myeditor'
    })
</script>
@stop
