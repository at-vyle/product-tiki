<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->boolean('type')->default(2)->comment('1: review, 2: comment');;
            $table->text('content')->nullable()->charset('utf8')->collation('utf8_unicode_ci');
            $table->unsignedInteger('rating')->nullable();
            $table->boolean('status')->default(0);
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('no action');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('no action');
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
        Schema::dropIfExists('posts');
    }
}
