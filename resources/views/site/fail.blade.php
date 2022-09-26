@extends('site.master')


@section('title', 'Failed proccess | ' . config('app.name'))

@section('content')

    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="block">
                            <div class="alert alert-danger ">
                                <p>Payment proccess failed</p>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('site.checkout') }}" class="btn btn-solid-border ">Back to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
