<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('full_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('avatar')->nullable();
            $table->boolean('gender')->default(0);
            $table->date('dob')->nullable();
            $table->string('address')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('phone',50)->nullable();
            $table->string('identity_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinfo');
    }
}
