<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->uuid('id')->unique()->index();
            $table->string('email', 50);
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('surname', 30);
            $table->string('second_surname', 30);
            $table->string('address', 100);
            $table->integer('phone');
            $table->string('job', 100);
            $table->string('department', 10);
            $table->string('city', 15);
            $table->string('identification', 30);
            $table->string('identification_type', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
