<?php

namespace Tests\Feature\Order;

use App\Models\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowOrderTest extends TestCase
{
    /** @test */
    public function it_load_show_order()
    {
          $order = factory(Order::class)->create();

          $response = $this->get('/order/' . $order->id);
  
          $response->assertStatus(200);
  
    }

    /** @test */
    public function it_show_order()
    {
      $this->withoutExceptionHandling();

      $order = factory(Order::class)->create();

      $response = $this->get('order/'. $order->id);
      $response->assertOk();

      $order = Order::first();

      $response->assertViewIs('order.show');

    }
}
