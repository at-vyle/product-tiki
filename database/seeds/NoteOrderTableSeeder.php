<?php

use Illuminate\Database\Seeder;

class NoteOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\NoteOrder', 10)->create();
    }
}