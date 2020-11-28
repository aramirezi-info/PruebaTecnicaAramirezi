@extends('layouts.master')
@section('title','Inicio')
@section('body')

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $product)
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">

                        <!-- Product Image -->
                        <a href="{{route('orderProduct', $product->id)}}">
                            <div class="product-img">
                                <img src="{{asset($product->image)}}" alt="">
                            </div>
                        </a>

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">${{$product->price}}</p>
                                <a href="product-details.html">
                                    <h6>{{$product->description}}</h6>
                                </a>
                            </div>
                            <!-- Ratings & Cart -->
                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="cart">
                                    <a href="{{route('orderProduct', $product->id)}}" data-toggle="tooltip" data-placement="left" title="Añadir al carrito"><img src="{{ asset('img/core-img/cart.png') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop