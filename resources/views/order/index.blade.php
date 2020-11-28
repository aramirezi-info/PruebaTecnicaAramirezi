@extends('layouts.master')
@section('title',trans('order.order'))
@section('body')
        

<div class="cart-table-area section-padding-100 section-padding-top">
    <div class="container-fluid">


@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible section-margin-top-50">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </h4>
    </div>
@endif

        <form action="{{route('order.store', $product->id)}}" method="post">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
            <div class="row">
                <div class="col-12 col-lg-8">
                    
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>{{ trans('order.order') }}</h2>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="customer_name" class="control-label required">{{ trans('order.name') }}</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"  value="" maxlength="80" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="customer_email" class="control-label required">{{ trans('order.email') }}</label>
                                <input type="email" class="form-control" name="customer_email" id="customer_email" value="" maxlength="120" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="customer_mobile" class="control-label required">{{ trans('order.mobile') }}</label>
                                <input type="text" class="form-control" name="customer_mobile" id="customer_mobile" value="" maxlength="40" required>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>{{ trans('order.summary') }}</h5>
                        <ul class="summary-table">
                            <li><span>{{ trans('order.product') }}:</span></li>
                            <li><span>{{$product->description}}</span></li>
                            <li><span>{{ trans('order.subtotal') }}:</span> <span>${{$product->price}}</span></li>
                            <li><span>{{ trans('order.delivery') }}:</span> <span>{{ trans('order.free') }}</span></li>
                            <li><span>{{ trans('order.total') }}:</span> <span>${{$product->price}}</span></li>
                        </ul>

                        <div class="cart-btn mt-100">
                            <button type="submit" class="btn amado-btn w-100">{{ trans('order.pay') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop