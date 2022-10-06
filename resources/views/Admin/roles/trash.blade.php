@extends('Admin.master')

@section('title', 'Trash Roles | Admin')

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
<h1 class="h3 mb-4 text-gray-800">Trashed Role</h1>

@if (session('msgg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msgg') }}
    </div>
@endif

<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>

        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.restore', $role->id) }}"><i class="fas fa-undo"></i></a>
            <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.roles.forcedelete', $role->id) }}"><i class="fas fa-times"></i></a>

        </td>
    </tr>
    @endforeach

</table>
@stop
