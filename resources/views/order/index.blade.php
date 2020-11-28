@extends('layouts.master')
@section('title',trans('order.order'))
@section('body')

<div class="cart-table-area section-padding-100 section-padding-top">
    <div class="container-fluid">
        <form action="#" method="post">
            <div class="row">
                <div class="col-12 col-lg-8">

                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>{{ trans('order.order') }}</h2>
                        </div>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="customer_name" class="control-label">{{ trans('order.name') }}</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"  value="" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="customer_email" class="control-label">{{ trans('order.email') }}</label>
                                <input type="email" class="form-control" name="customer_email" id="customer_email" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="customer_mobile" class="control-label">{{ trans('order.mobile') }}</label>
                                <input type="email" class="form-control" name="customer_mobile" id="customer_mobile" value="" required>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>{{ trans('order.summary') }}</h5>
                        <ul class="summary-table">
                            <li><span>{{ trans('order.subtotal') }}:</span> <span>$140.00</span></li>
                            <li><span>{{ trans('order.delivery') }}:</span> <span>Free</span></li>
                            <li><span>{{ trans('order.total') }}:</span> <span>$140.00</span></li>
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