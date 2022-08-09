<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('covid_id')->nullable();
            $table->date('date')->nullable();
            $table->string('dokter')->nullable();
            $table->string('checking')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('checkings');
    }
}
