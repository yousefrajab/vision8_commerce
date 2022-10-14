@extends('admin.master')

@section('title', 'Trash Categories | Admin')

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
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.Trashed Categories') }}</h1>

    @if (session('msgg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msgg') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.ID') }}</th>
            <th>{{ __('site.Name') }}</th>
            <th>{{ __('site.Image') }}</th>
            <th>{{ __('site.Parent') }}</th>
            <th>{{ __('site.Deleted At') }}</th>
            <th>{{ __('site.Actions') }}</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->trans_name }}</td>
                <td><img width="80" src="{{ asset('uploads/categories/'.$category->image) }}" alt=""></td>
                <td>{{ $category->parent->trans_name }}</td>
                <td>{{ $category->deleted_at ? $category->deleted_at->diffForHumans() : '' }}</td>

                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.restore', $category->id) }}"><i
                            class="fas fa-undo"></i></a>
                    <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"
                        href="{{ route('admin.categories.forcedelete', $category->id) }}"><i class="fas fa-times"></i></a>

                </td>

            </tr>
        @endforeach

    </table>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.categories.restore_all') }}" class="btn btn-success"> <i
            class="fas fa-undo"> </i>{{ __('site.Restore All') }}</a>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.categories.delete_all') }}" class="btn btn-danger "><i
            class="fas fa-times"> </i>{{ __('site.Delete All') }}</a>
@stop
