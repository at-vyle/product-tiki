<?php

namespace Tests\Browser\ProductTest;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Product;

class UpdateProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test update product success.
     *
     * @return void
     */
    public function testUpdateProduct()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 3)->create();
            $product = Product::find(2);

            $browser->visit('/admin/products/' . $product->id . '/edit')
                    ->assertSee('Update Product')
                    ->select('category_id')
                    ->type('name', 'Iphone')
                    ->type('description', 'This is a Smart Phone')
                    ->type('price', '10000000')
                    ->type('quantity', '100')
                    ->attach('input_img[]', __DIR__.'/testing/iphone1.jpg')
                    ->press('Update')
                    ->assertPathIs('/admin/products/' . $product->id . '/edit')
                    ->assertSee('Update product successfully');

            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => 'Iphone',
                'description' => 'This is a Smart Phone',
                'price' => '10000000',
                'quantity' => '100',
            ]);
        });
    }

    /**
     * A Dusk test input null value.
     *
     * @return void
     */
    public function testNullValue()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 3)->create();
            $product = Product::find(2);

            $browser->visit('/admin/products/' . $product->id . '/edit')
                    ->assertSee('Update Product')
                    ->type('name', ' ')
                    ->type('description', ' ')
                    ->type('price', ' ')
                    ->type('quantity', ' ')
                    ->press('Update')
                    ->assertPathIs('/admin/products/' . $product->id . '/edit')
                    ->assertDontSee('Update product successfully');

            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $product->quantity,
            ]);
        });
    }

    /**
     * A Dusk test input invalid value.
     *
     * @return void
     */
    public function testInvalidValue()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 3)->create();
            $product = Product::find(2);

            $browser->visit('/admin/products/' . $product->id . '/edit')
                    ->assertSee('Update Product')
                    ->select('category_id')
                    ->type('name', 'Iphone')
                    ->type('description', 'This is a Smart Phone')
                    ->type('price', '1.5')
                    ->type('quantity', '1.5')
                    ->attach('input_img[]', __DIR__.'/testing/iphone1.jpg')
                    ->press('Update')
                    ->assertPathIs('/admin/products/' . $product->id . '/edit')
                    ->assertDontSee('Update product successfully');

            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $product->quantity,
            ]);
        });
    }

    /**
     * A Dusk test input invalid format image.
     *
     * @return void
     */
    public function testInvalidImage()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Product', 3)->create();
            $product = Product::find(2);

            $browser->visit('/admin/products/' . $product->id . '/edit')
                    ->assertSee('Update Product')
                    ->select('category_id')
                    ->type('name', 'Iphone7')
                    ->type('description', 'This is a Smart Phone')
                    ->type('price', '1000000')
                    ->type('quantity', '10')
                    ->attach('input_img[]', __DIR__.'/testing/iphone1.zip')
                    ->press('Update')
                    ->assertPathIs('/admin/products/' . $product->id . '/edit')
                    ->assertDontSee('Update product successfully');

            $this->assertDatabaseHas('products', [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $product->quantity,
            ]);
        });
    }
}
