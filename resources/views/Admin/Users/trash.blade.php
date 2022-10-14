@extends('admin.master')

@section('title', 'Trash Users | Admin')

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
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.Trashed Users') }}</h1>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.ID') }}</th>
            <th>{{ __('site.Name') }}</th>
            <th>{{ __('site.Email') }}</th>
            <th>{{ __('site.Deleted At') }}</th>
            <th>{{ __('site.Actions') }}</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->deleted_at ? $user->deleted_at->diffForHumans() : '' }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.restore', $user->id) }}"><i
                        class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure???')"><i
                                class="fas fa-trash">
                            </i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

    </table>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.users.restore_all') }}" class="btn btn-success"> <i
            class="fas fa-undo"> </i>{{ __('site.Restore All') }}</a>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.users.delete_all') }}" class="btn btn-danger "><i
            class="fas fa-times"> </i>{{ __('site.Delete All') }}</a>
@stop
