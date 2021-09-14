<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo',255);
            $table->text('bio');
            $table->string('phone',255);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('address',255);
            $table->string('city',255);
            $table->string('zipcode',255);
            $table->string('country',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
