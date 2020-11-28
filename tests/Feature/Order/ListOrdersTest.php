<?php

namespace Tests\Feature\order;

use App\Models\Product;
use App\Models\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListOrdersTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function it_visit_list_orders()
    {
        $response = $this->get('/orders');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_list_orders()
    {

        $this->withoutExceptionHandling();

        factory(Order::class,4)->create();
 
        $response = $this->get('orders');
        $response->assertOk();

        $orders = Order::all();

        $response->assertViewIs('order.list');
    }
}
