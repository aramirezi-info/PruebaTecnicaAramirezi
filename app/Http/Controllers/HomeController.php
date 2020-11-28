<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->all();

        return view('welcome', compact('products'));
    }
   
}
