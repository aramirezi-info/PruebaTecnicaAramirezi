@extends('layouts.master')
@section('title',trans('order.order'))
@section('body')
        

<div class="cart-table-area section-padding-100 section-padding-top">
    <div class="container-fluid">



    <div class="alert alert-primary alert-dismissible section-margin-top-50">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <ul>
                <li>{{$message}}</li>
            </ul>
        </h4>
    </div>


        <form action="{{route('order.store', $order->id)}}" method="post">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="{{$order->id}}">
            <div class="row">
                <div class="col-12 col-lg-8">
                    
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>{{ trans('order.order') }}</h2>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="customer_name" class="control-label required">{{ trans('order.name') }}</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"  value="{{$order->customer_name}}" disabled required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="customer_email" class="control-label required">{{ trans('order.email') }}</label>
                                <input type="email" class="form-control" name="customer_email" id="customer_email" value="{{$order->customer_email}}" disabled required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="customer_mobile" class="control-label required">{{ trans('order.mobile') }}</label>
                                <input type="text" class="form-control" name="customer_mobile" id="customer_mobile" value="{{$order->customer_mobile}}" disabled required>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>{{ trans('order.summary') }}</h5>
                        <ul class="summary-table">
                            <li><span>{{ trans('order.name') }}:</span></li>
                            <li><span>{{$order->product->description}}</span></li>
                            <li><span>{{ trans('order.subtotal') }}:</span> <span>${{$order->product->price}}</span></li>
                            <li><span>{{ trans('order.delivery') }}:</span> <span>{{ trans('order.free') }}</span></li>
                            <li><span>{{ trans('order.total') }}:</span> <span>${{$order->product->price}}</span></li>
                        </ul>
                        @if($order->status != 'APPROVED')
                        <div class="cart-btn mt-100">
                            <a href="{{route('order.retry', $order->id)}}" class="btn amado-btn w-100">{{ trans('order.retry') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop