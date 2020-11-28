@extends('layouts.master')
@section('title',trans('order.order'))
@section('body')
        
<div class="cart-table-area section-padding-100 section-marign-top-50">
    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">{{ trans('order.nunberOrder') }}</th>
                    <th scope="col">{{ trans('order.product') }}</th>
                    <th scope="col">{{ trans('order.price') }}</th>
                    <th scope="col">{{ trans('order.status') }}</th>
                    <th scope="col">{{ trans('order.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->product->description}}</td>
                        <td>${{$order->product->price}}</td>
                        <td>{{\App\Statu::$status[$order->status]}}</td>
                        <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                    </tr>
                @endforeach()

            </tbody>
        </table>
    </div>
</div>

@stop