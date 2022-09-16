@extends('Admin.master')
@section('title', 'Create Product | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create New Product</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
@include('Admin.errors')

<form action="{{ route('admin.products.store') }}" method ="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-6">
    <div class="mb-3">
        <label>English Name</label>
        <input type="text" placeholder="English Name" name="name_en" class="form-control"  />
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label>Arabic Name</label>
        <input type="text" placeholder="Arabic Name" name="name_ar" class="form-control" />
    </div>
</div>
</div>
<div class="mb-3">
    <label for="image">Image</label>
    <input id="image" type="file" name="image" class="form-control" />
</div>
<div class="mb-3">
    <label>Album</label>
    <input type="file" name="album[]" multiple class="form-control" />
</div>

<div class="mb-3">
    <label>English Content</label>
    <textarea placeholder="English Content" name="content_en" class="myeditor" ></textarea>
</div>
<div class="mb-3">
    <label>Arabic Content</label>
    <textarea placeholder="Arabic Content" name="content_ar" class="myeditor" ></textarea>
</div>

<div class="row">
<div class="col-md-4">
    <div class="mb-3">
        <label>Price</label>
        <input type="text" placeholder="Price" name="price" class="form-control" />
    </div>
</div>
<div class="col-md-4">
    <div class="mb-3">
        <label>Sale Price</label>
        <input type="text" placeholder="Sale Price" name="sale_price" class="form-control" />
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <label>Quantity</label>
        <input type="text" placeholder="Quantity" name="quantity" class="form-control" />
    </div>
</div>
</div>
<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
       <option value="">Select</option>
       @foreach ($categories as $item )
        <option value="{{ $item->id }}
            ">{{ $item->trans_name }}</option>
        @endforeach
    </select>
</div>
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
