<?php

namespace Tests\Feature;

use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function it_visit_page_of_home()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_load_products_of_index()
    {
        $this->withoutExceptionHandling();

        factory(Product::class,6)->create();
    
        $response = $this->get('/');
        $response->assertOk();

        $products = Product::all();

        $response->assertViewIs('welcome');
        $response->assertViewHas('products',$products);
    }
}
