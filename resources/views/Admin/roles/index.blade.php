@extends('admin.master')

@section('title', 'Role Index | Admin')

@section('styles')

<style>
    .table th,
    .table td {
        vertical-align: middle
    }
</style>

@stop

@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800">{{ __('site.All Roles') }}</h1>
    {{-- <a class="btn btn-success w-25" href="{{ route('admin.roles.create') }}">Add New</a> --}}
</div>

@if (session('msgg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msgg') }}
    </div>
@endif

<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>{{ __('site.ID') }}</th>
        <th>{{ __('site.Name') }}</th>
        <th>{{ __('site.Actions') }}</th>
    </tr>
    @foreach ($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>

        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach


</table>
{{-- <div class="text-center mt-4">

</div> --}}
{{ $roles->links() }}
@stop
