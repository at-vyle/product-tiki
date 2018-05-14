<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->text('description')->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('total_rate')->default(0);
            $table->unsignedInteger('rate_count')->default(0);
            $table->decimal('avg_rating',5,1)->default(0);
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity')->default(1);
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
