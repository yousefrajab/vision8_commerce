@extends('admin.master')

@section('title', 'Create Role | Admin')

@section('styles')

<style>
    ul {
        column-count: 2;
    }
</style>

@stop

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('site.Add New Role') }}</h1>
@include('admin.errors')
<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control" />
    </div>

    <label><input type="checkbox" id="check_all"> Select All</label> <br>
    <ul class="list-unstyled">
        @foreach ($abilities as $ability)
            <li><label><input type="checkbox" name="ability[]" value="{{ $ability->id }}"> {{ $ability->name }}</label></li>
        @endforeach
    </ul>


    {{-- <button class="btn btn-success w-25">Add</button> --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-success w-25 mb-4">Add</button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark w-25">Back to Role Index</a>
    </div>
</form>
@stop


@section('scripts')
<script>
    $('#check_all').on('change', function() {
        $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
    })
</script>
@stop
