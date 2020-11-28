<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Order;
use App\PlacetoPay\WebChekOut;

class WebChekOutTest extends TestCase
{
    /** @test */
    public function verify_webchekout_connection()
    {

        $place = new WebChekOut(
            config('placetopay.url'),
            config('placetopay.login'),
            config('placetopay.trankey')
        );

        $this->assertEquals('App\PlacetoPay\WebChekOut', get_class($place));

    }

    /** @test */
    public function verify_webchekout_transaction()
    {

        $place = new WebChekOut(
            config('placetopay.url'),
            config('placetopay.login'),
            config('placetopay.trankey')
        );

        $request = request();
        $product = factory(Product::class)->create();
        $order = factory(Order::class)->create();

        $trans = $place->transaction($request,$order,$product);

        $this->assertTrue($trans->isSuccessful());

    }
}
