<?php

use Illuminate\Database\Seeder;

class CancelOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\CancelOrder', 10)->create();
    }
}