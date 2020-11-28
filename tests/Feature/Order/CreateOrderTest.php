<?php

namespace Tests\Feature\Order;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function create_order()
    {

        $product = factory(Product::class)->create();
        
        $this->post('order/'.$product->id,[
            'customer_name' => 'Name',
            'customer_email' => 'mail@mail.com',
            'customer_mobile' => '123456789',
            'product_id' => $product->id,
        ])->assertRedirect();
        
        
        $order = Order::first();

        $this->assertEquals('Name', $order->customer_name);
        $this->assertEquals('mail@mail.com', $order->customer_email);
        $this->assertEquals('123456789', $order->customer_mobile);
    }

}
