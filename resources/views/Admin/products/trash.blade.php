@extends('admin.master')

@section('title', 'Trash Products| Admin')

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
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.Trashed Products') }}</h1>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.ID') }}</th>
                <th>{{ __('site.Name') }}</th>
                <th>{{ __('site.Image') }}</th>
                {{-- <th>Content</th> --}}
                <th>{{ __('site.Price') }}</th>
                <th>{{ __('site.Sale Price') }}%</th>
                <th>{{ __('site.Quantity') }}</th>
                <th>{{ __('site.Category') }}</th>
                <th>{{ __('site.Deleted At') }}</th>
            <th>{{ __('site.Actions') }}</th>
        </tr>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->trans_name }}</td>
                    <td><img width="80" src="{{ asset('uploads/products/'. $product->image) }}" alt="">
                    </td>
                    {{-- <td>{{ $product->trans_content }}</td> --}}
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->trans_name }}</td>
                    <td>{{ $product->deleted_at ? $product->deleted_at->diffForHumans() : '' }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.products.restore', $product->id) }}"><i
                            class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure ? ')" class="btn btn-sm btn-danger">
                                <i
                                    class="fas fa-trash">
                                </i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.products.restore_all') }}" class="btn btn-success"> <i
            class="fas fa-undo"> </i>{{ __('site.Restore All') }}</a>
    <a onclick="return confirm('Are You sure ?') " href="{{ route('admin.products.delete_all') }}" class="btn btn-danger "><i
            class="fas fa-times"> </i>{{ __('site.Delete All') }}</a>
@stop
