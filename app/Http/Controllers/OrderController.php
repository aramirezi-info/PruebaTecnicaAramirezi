<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Models\Order;
use App\PlacetoPay\WebChekOut;
use App\Repositories\OrderRepository;


class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    public function order(ProductRepository $productRepository, Product $product)
    { 
        return view('order.index', compact('product'));
    }

    public function store(StoreOrderRequest $request, WebChekOut $webcheckout, OrderRepository $orderRepository,  Product $product ){


        $order = $orderRepository->create($request->all());
        $response = $webcheckout->transaction($request, $order, $product);

        if ($response->isSuccessful()) {
            $orderRepository->registerTransactionData($order, $response->requestId());
            return redirect()->away($response->processUrl());
        }

    }

    public function show(OrderRepository $orderRepository, WebChekOut $webcheckout, $id){

        $order = $orderRepository->find($id);
        $response = $webcheckout->query($order);

        if ($response->isSuccessful()) {
            $responseTransaction = $response->status();
            $orderRepository->updateStatusTransaction($order, $responseTransaction->status());
            $message = $responseTransaction->message();
        } else {
            $message = $response->status()->message();
        }

        $order = $orderRepository->find($id);
        return view('order.show', compact('order', 'message'));

    }

    public function retry(Request $request, WebChekOut $webcheckout, OrderRepository $orderRepository, Order $order ){

        $product = Product::find($order->product_id);
        $response = $webcheckout->transaction($request, $order, $order->product);

        if ($response->isSuccessful()) {
            $orderRepository->registerTransactionData($order, $response->requestId());
            return redirect()->away($response->processUrl());
        }

    }


    public function list(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->all();
        return view('order.list', compact('orders'));
    }
    
}
