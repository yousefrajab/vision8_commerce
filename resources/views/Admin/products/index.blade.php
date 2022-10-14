@extends('Admin.master')
@section('title', 'Product | ' . env('APP_NAME'))
@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('site.All Products') }}</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}
        </div>
    @endif
    <table class="table table-borderd table-hover">
        <thead>
            <tr>
                <th>{{ __('site.ID') }}</th>
                <th>{{ __('site.Name') }}</th>
                <th>{{ __('site.Image') }}</th>
                {{-- <th>Content</th> --}}
                <th>{{ __('site.Price') }}</th>
                <th>{{ __('site.Sale Price') }}%</th>
                <th>{{ __('site.Quantity') }}</th>
                <th>{{ __('site.Category') }}</th>
                <th>{{ __('site.Created At') }}</th>
            <th>{{ __('site.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->trans_name }}</td>
                    <td><img width="80" src="{{ asset('uploads/products/'. $product->image) }}" alt="">
                    </td>
                    {{-- <td>{{ $product->trans_content }}</td> --}}
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_price }}%</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->trans_name }}</td>
                    <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
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
    {{ $products->links() }}



@stop
