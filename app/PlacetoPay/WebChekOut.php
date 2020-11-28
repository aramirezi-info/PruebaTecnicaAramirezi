<?php

namespace App\PlacetoPay;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use App\Models\Product;
use App\Models\Order;

class WebChekOut {

    private $url;
    private $login;
    private $tranKey;

    public function __construct(string $url, string $login, string $tranKey){
        $this->url = $url;
        $this->login = $login;
        $this->tranKey = $tranKey;
    }
     
    private function connection()
    {
        return new PlacetoPay([
            'login' => $this->login,
            'tranKey' => $this->tranKey,
            'url' => $this->url,
            'rest' => [
                'timeout' => 45,
                'connect_timeout' => 30,
            ],
        ]);
    }

    public function transaction(Request $request, Order $order, Product $product){

        $placetopay = $this->connection();

        $reference = $order->id;
        $requestPlacetopay = [
            'payment' => [
                'reference' => $reference,
                'description' => $product->description,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $product->price,
                ]
            ],
            'expiration' => date('c', strtotime('+7 days')),
            'returnUrl' => route('order.show', $reference),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent')
        ];

        return $placetopay->request($requestPlacetopay);

    }

    public function query(Order $order){
        $placetopay = $this->connection();
        return $placetopay->query($order->transaction_id);
    }

    
}